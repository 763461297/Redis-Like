<?php
require_once(__DIR__.'/lib/common.php');
$dat = getTreeObject();
if(empty($_GET)) {
	echo 'Parameter error!';
} else {
	$cnt = 0;
	foreach ($_GET as $key=>$val) {
		$ret = $dat->insert($key, $val);
		if($ret) {
			$cnt++;
		} else {
			echo '('.$key.','.$val.') insert/update failed.<br/>';
		}
	}
	echo 'OK, '.$cnt.' item(s) affected.<br/>';
}