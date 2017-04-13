<?php
require_once(__DIR__.'/lib/common.php');
$dat = getTreeObject();
if(isset($_GET['key'])) {
	$key = $_GET['key'];
	$val = $dat->search($key);
	if(empty($val)) {
		echo 'The key does not exist!';
	} else {
		echo $key.' => ';
		var_dump($val);
	}
} else {
	echo 'List all keys and values<br/>';
	echo '========================<br/>';
	$dat->listAll();
}
