<?php
	require '../lib/init.lib.php';
	$id = input_get('id');
	$uid = input_get('uid');
	$sql = "delete from t_cart where id=$id";
	db_query($sql);
	header("Location:shopping_cart.php?userid=$uid");
?>