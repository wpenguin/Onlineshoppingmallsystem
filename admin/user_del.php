<?php
	require '../lib/init.lib.php';
	$id = input_get('id');
	$sql = "delete from t_user_information where userid=$id";
	db_query($sql);
	$sql = "delete from t_cart where uid=$id";
	db_query($sql);
	$sql = "delete from t_orders where uid=$id";
	db_query($sql);
	$sql = "delete from t_users where id=$id";
	db_query($sql);
	echo "<script>
		alert('删除成功');
		history.back(-1);
		</script>";
//	header('Location: index.php');
?>