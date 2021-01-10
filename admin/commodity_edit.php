<?php
	require '../lib/init.lib.php'; 
	$id = (int)input_get('id');
	if ($_POST) {
	    $allow_fields = array('commodityno', 'commodityname', 'commodityprice', 'discount');
	    $update = array();
	    foreach ($allow_fields as $v) {
	        $data = input_post($v); 
	        $data = db_escape(filter($data)); 
	        if ($data == '') {
	            alert_back($v . '字段不能为空');
	        }
	        $update[] = "`$v`='$data'";
	    }
	    $update_sql = implode(',', $update);
	    $sql = "update t_commodity set $update_sql where id=$id";
	    if ($res = db_query($sql)) {
	        echo "<script> history.back(-1); </script>";
	        exit;
	    } else {
	        alert_back('修改失败');
	    }
	}
?>