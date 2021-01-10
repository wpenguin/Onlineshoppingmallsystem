<?php
	require '../lib/init.lib.php';
	$ids = $_GET['id'];
	$uid = input_get('uid');
	$num = $_GET['num'];
	$cprice = $_GET['cprice'];
	$begin = 0;
	$end = 20;
	$limt = 5;
	$adderror = array();
	$sql = "select address,name from t_user_information where userid=$uid";
	$row = db_fetch_row($sql);
	if($row['address'] == null || $row['name'] == null){
		$adderror[] = '请设置配送地址和联系人！';
	}
	
	if($adderror == null){
		$address = $row['address'];
		$name = $row['name'];
		$phone = db_fetch_column("select phonenumber from t_users where id=$uid");
		for($i = 0;$i < count($ids);$i++){
			$rand_array = range($begin,$end);
			shuffle($rand_array);
			$rst = array_slice($rand_array,0,$limt);
			$info = $rst[0].$rst[1].$rst[2].$rst[3].$rst[4];
			$orderno = 'order-'.$info;
			$a = $num[$i];
			$b = $cprice[$i];
			$c = $ids[$i];
			$sql = "select cid from t_cart where id=$c";
			$cid = db_fetch_column($sql);
			$sql = "insert into t_orders(orderno,num,cprice,uid,contact,phone,address,cid) values('$orderno',$a,$b,$uid,'$name','$phone','$address',$cid)";
			db_query($sql);
			$sql = "delete from t_cart where id=$c";
			db_query($sql);
		}
		header("Location:my_order.php?userid=$uid");
	}else{
		header("Location:shopping_cart.php?userid=$uid");
	}
	
?>