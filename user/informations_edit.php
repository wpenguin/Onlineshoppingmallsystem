<?php
	require '../lib/init.lib.php';
	$uid = input_get('uid');
	$uname = input_post('uname');
	$phone = input_post('phone');
	$name = input_post('name');
	$sex = input_post('sex');
	$address = input_post('address');
	$signature = input_post('signature');
	if(db_query("select * from t_users where username='$uname'") == null){
		db_query("update t_users set username='$uname' where id=$uid");
	}
	if(db_query("select * from t_users where phonenumber=$phone") == null){
		db_query("update t_users set phonenumber=$phone where id=$uid");
	}
	db_query("update t_user_information set name='$name',sex='$sex',address='$address',signature='$signature' where id=$uid");
	header("Location:information.php?uid=$uid");
?>