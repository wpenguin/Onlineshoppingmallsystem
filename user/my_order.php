<?php
	require '../lib/init.lib.php';
	require 'userislogin.php';
	$uid = input_get('userid');
	$state = input_get('state');
	
	if($state == null || $state == 'all'){
		$sql = "select * from t_orders where uid=$uid";
		$falses = db_fetch_all($sql);
		$false = array();
		foreach($falses as $row){
			$cid = $row['cid'];
			$sql = "select productpicture,commodityname,commodityprice,discount from t_commodity where id=$cid";
			$res = db_fetch_row($sql);
			array_push($row,$res['productpicture']);
			array_push($row,$res['commodityname']);
			array_push($row,$res['commodityprice']);
			array_push($row,$res['discount']);
			array_push($false,$row);
		}
	}else if($state == '未'){
		$sql = "select * from t_orders where uid=$uid and state=0";
		$falses = db_fetch_all($sql);
		$false = array();
		foreach($falses as $row){
			$cid = $row['cid'];
			$sql = "select productpicture,commodityname,commodityprice,discount from t_commodity where id=$cid";
			$res = db_fetch_row($sql);
			array_push($row,$res['productpicture']);
			array_push($row,$res['commodityname']);
			array_push($row,$res['commodityprice']);
			array_push($row,$res['discount']);
			array_push($false,$row);
		}
	}else if($state == '已'){
		$sql = "select * from t_orders where uid=$uid and state=1";
		$falses = db_fetch_all($sql);
		$false = array();
		foreach($falses as $row){
			$cid = $row['cid'];
			$sql = "select productpicture,commodityname,commodityprice,discount from t_commodity where id=$cid";
			$res = db_fetch_row($sql);
			array_push($row,$res['productpicture']);
			array_push($row,$res['commodityname']);
			array_push($row,$res['commodityprice']);
			array_push($row,$res['discount']);
			array_push($false,$row);
		}
	}
	
	require 'index_top.php';
	require './view/my_order.html';
	require 'index_foot.php'
?>