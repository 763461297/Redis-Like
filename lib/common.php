<?php
require_once('Node.php');
require_once('RBTree.php');
if(empty($_SESSION)) {
	session_cache_expire(300);
	session_start();
}
/**
 * Get RBTree(Database)
 * @return RBTree 
 */
function getTreeObject() {
	$dat = null;
	if(isset($_SESSION['data'])) {
		$dat = $_SESSION['data'];
	}
	if(empty($dat)) {
		$dat = new RBTree();
		$_SESSION['data'] = $dat;
	}
	return $dat;
}