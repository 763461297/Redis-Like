<?php

/**
 * RBTree Node
 * @author Shannon
 */
class Node {
	
	public static $RED = 0;
	public static $BLACK = 1;
	
	public $color, $key, $value;
	
	public $children = 0;	// the number of children
	public $lch, $rch;

	/**
	 * construct
	 * @param mixed $key
	 * @param mixed $val
	 * @param integer $number
	 * @param static $clr
	 */
	public function __construct($key, $val, $number, $clr) {
		$this->key = $key;
		$this->value = $val;
		$this->children = $number;
		$this->color = $clr;
	}
	/**
	 * Get node type (if red)
	 * @return bool
	 */
	public function isRed() {
		return ($this->color == Node::$RED);
	}
	/**
	 * Get the number of current node child nodes
	 * @return integer
	 */
	public function getSize() {
		return $this->children;
	}
	/**
	 * Calculate the number of child nodes
	 * @return integer
	 */
	public function calcSize() {
		$tmp = 1;
		if(!empty($this->lch)) {
			$tmp += $this->lch->getSize();
		}
		if(!empty($this->rch)) {
			$tmp += $this->rch->getSize();
		}
		return $tmp;
	}
}