<?php

/**
 * RBTree
 * @author Shannon
 */
class RBTree {
	
	private $root;
	
	/**
	 * Operation - Left Rotate
	 * @param Node $node
	 * @return Node
	 */
	private function rotateLeft(Node $node) {
		$tmp = $node->rch;
		$node->rch = $tmp->lch;
		$tmp->lch = $node;
		$tmp->color = $node->color;
		$node->color = Node::$RED;
		$tmp->children = $node->children;
		$node->children = $node->calcSize();
		return $tmp;
	}
	/**
	 * Operation - Right Rotate
	 * @param Node $node
	 * @return Node
	 */
	private function rotateRight(Node $node) {
		$tmp = $node->lch;
		$node->lch = $tmp->rch;
		$tmp->rch = $node;
		$tmp->color = $node->color;
		$node->color = Node::$RED;
		$tmp->children = $node->children;
		$node->children = $node->calcSize();
		return $tmp;
	}
	/**
	 * Operation - Color Exchange
	 * @param Node $node
	 * @return Node
	 */
	private function rotateColor(Node $node) {
		$node->color = Node::$RED;
		$node->lch->color = Node::$BLACK;
		$node->rch->color = Node::$BLACK;
		return $node;
	}
	/**
	 * Check if node is red
	 * @param Node $node
	 * @return bool
	 */
	private function isRed(Node $node = null) {
		if(empty($node)) {
			return false;
		}
		return $node->isRed();
	}
	/**
	 * Find the value based on the key
	 * @param mixed $key
	 * @return mixed
	 */
	public function search($key) {
		return $this->search2($key, $this->root);
	}
	/**
	 * Built-in recursion
	 * @param mixed $key
	 * @param Node $node
	 * @return mixed
	 */
	private function search2($key, Node $node = null) {
		if(empty($node)) {
			return null;
		}
		if($key < $node->key) {
			return $this->search2($key, $node->lch);
		} else if($key > $node->key) {
			return $this->search2($key, $node->rch);
		} else {
			return $node->value;
		}
	}
	/**
	 * Insert (key, value) pair
	 * @param mixed $key
	 * @param mixed $val
	 * @return boolean If insert success
	 */
	public function insert($key, $val) {
		$node = $this->insert2($this->root, $key, $val);
		if(empty($node)) {
			return false;
		}
		$node->color = Node::$BLACK;
		$this->root = $node;
		return true;
	}
	/**
	 * Built-in recursion
	 * @param Node $node
	 * @param mixed $key
	 * @param mixed $val
	 * @return Node
	 */
	private function insert2(Node $node = null, $key, $val) {
		if(empty($node)) {
			return new Node($key, $val, 1, Node::$RED);
		}
		if($key < $node->key) {
			$node->lch = $this->insert2($node->lch, $key, $val);
		} else if ($key > $node->key) {
			$node->rch = $this->insert2($node->rch, $key, $val);
		} else {
			$node->value = $val;
		}
		
		if(!$this->isRed($node->lch) && $this->isRed($node->rch)) {
			$node = $this->rotateLeft($node);
		}
		if($this->isRed($node->lch) && $this->isRed($node->lch->lch)) {
			$node = $this->rotateRight($node);
		}
		if($this->isRed($node->lch) && $this->isRed($node->rch)) {
			$node = $this->rotateColor($node);
		}
		$node->children = $node->calcSize();
		return $node;
	}
	/**
	 * List all keys and values
	 */
	public function listAll() {
		$this->listAll2($this->root);
	}
	/**
	 * Built-in recursion
	 * @param Node $node
	 */
	private function listAll2(Node $node = null) {
		if(empty($node)) {
			return null;
		}
		$this->listAll2($node->lch);
		echo $node->key.' => ';
		var_dump($node->value);
		echo '<br/>';
		$this->listAll2($node->rch);
	}
}