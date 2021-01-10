<?php
	require '../lib/init.lib.php';
	$uid = input_get('uid');
	$name = input_get('name');
	$phone = input_get('phone');
	$address = input_get('address');
	if($name != null){
		db_query("update t_user_information set name='$name' where userid=$uid");
	}
	if($phone != null){
		db_query("update t_users set phonenumber='$phone' where id=$uid");
	}
	if($address != null){
		db_query("update t_user_information set address='$address' where userid=$uid");
	}
	header("Location:shopping_cart.php?userid=$uid");
?>