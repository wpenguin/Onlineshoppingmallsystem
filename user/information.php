<?php
	require '../lib/init.lib.php';
	require 'userislogin.php';
	$uid = input_get('uid');
	$row = db_fetch_row("select * from t_user_information where userid=$uid");
	$col = db_fetch_row("select username,phonenumber from t_users where id=$uid");
	require 'index_top.php';
	require './view/information.html';
	require 'index_foot.php';
?>