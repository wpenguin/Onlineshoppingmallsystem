<?php
	require '../lib/init.lib.php';
	$orderno = input_get('orderno');
	$sql = "delete from t_orders where orderno=$orderno";
	db_query($sql);
	echo "<script>
		alert('删除成功');
		history.back(-1);
		</script>";
?>