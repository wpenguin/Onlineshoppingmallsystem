<?php
	require '../lib/init.lib.php';
	require 'userislogin.php';
	$userid = input_get('userid');
	$address = db_fetch_column("select address from t_user_information where userid=$userid");
	$name = db_fetch_column("select name from t_user_information where userid=$userid");
	$phone = db_fetch_column("select phonenumber from t_users where id=$userid");
	$sql = "select * from t_cart where uid=$userid";
	$max = array();
	$cmoney = 0;
	$rows = db_fetch_all($sql);
	foreach($rows as $row){
		$id = $row['id'];
		$cid = $row['cid'];
		$sql = "select productpicture,commodityname,commodityprice,discount from t_commodity where id=$cid";
		$res = db_fetch_row($sql);
		$num = $row['num'];
		$cmoney += $num*$res['discount']*$res['commodityprice'];
		array_push($res,$num);
		array_push($res,$id);
		array_push($max,$res);
	}
	require 'index_top.php';
	require './view/shopping_cart.html';
	require 'index_foot.php'
?>