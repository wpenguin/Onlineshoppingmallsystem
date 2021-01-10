<?php
	require '../lib/init.lib.php';
	$orderno = input_get('orderno');
	$sql = "update t_orders set state=1 where orderno='$orderno'";
	db_query($sql);
	echo "<script>
		alert('发货成功');
		history.back(-1);
		</script>";
?>