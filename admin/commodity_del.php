<?php
	require '../lib/init.lib.php';
	$id = (int)input_get('id');
	$sql = "delete from t_cart where cid=$id";
	db_query($sql);
	$sql = "delete from t_orders where cid=$id";
	db_query($sql);
	$sql = "delete from t_commodity where id=$id";
	db_query($sql);
	echo "<script> history.back(-1); </script>";
?>