<?php
	require '../lib/init.lib.php';
	$id = input_get('id');
	$uid = input_get('userid');
	$num = input_get('num');
	$sql = "insert into t_cart(num,cid,uid) values($num,$id,$uid)";
	db_query($sql);
	$sql = "select hits from t_commodity where id=$id";
	$hits = db_fetch_column($sql);
	header("Location:commodity_details.php?id=$id&hits=$hits");
?>