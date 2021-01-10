<?php
	require '../lib/init.lib.php';
	$error = array();
	function showRegPage() {
		require 'picture_add.php';
		require 'adminislogin.php';
		require 'index_top.php';
	    require './view/add_commodity.html';
	    exit;
	}
	if (empty($_POST)) {
    	showRegPage();
	}
	$commodityno = input_post('commodityno');
	$commodityname =  input_post('commodityname');
	$commodityprice =  input_post('commodityprice');
	$manufacturer =  input_post('manufacturer');
	$picture =  input_post('picture');
	$commodityno = db_escape(filter($commodityno));
	$commodityname = db_escape(filter($commodityname));
	$commodityprice = db_escape(filter($commodityprice));
	$manufacturer = db_escape(filter($manufacturer));
	$picture = db_escape(filter($picture));
	$sql = "insert into `t_commodity`(`commodityno`,`commodityname`,`commodityprice`,`productpicture`,`manufacturer`) values('$commodityno','$commodityname','$commodityprice','$picture','$manufacturer')";
	$rst = db_query($sql);
	if ($rst) {
		echo '<script>alert("添加成功！");window.location.href="index.php";</script>';
		exit;
	}else{
		echo '<script>alert("添加失败，数据库裂开！");</script>';
		showRegPage();
	}
?>