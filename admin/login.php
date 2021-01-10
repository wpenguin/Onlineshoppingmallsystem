<?php
	require '../lib/init.lib.php';
	$error = array();
	if (!empty($_POST)) {
	    $adminname = input_post('adminname');
	    $adminpwd = input_post('adminpassword');
	    $adminname = db_escape(filter($adminname));
	    $adminpwd = db_escape(filter($adminpwd));
	    $sql = "select id,adminpassword from t_admin where adminname='$adminname'";
	    $rst = db_query($sql);
        if(mysqli_num_rows($rst) == '0'){
        	$error[] = '该管理员不存在。';
        	header('Location: index.php');
        }else{
        	$row = mysqli_fetch_assoc($rst);
        	if($adminpwd == $row['adminpassword']){
        		session_start();
        		$_SESSION['admininfo'] = array(
                    'id' => $row['id'], 
                    'adminname' => $adminname
                );
                header('Location: index.php');
                exit;
        	}else{
        		$error[] = '密码错误了哦~好好想想密码。';
        		header('Location: index.php');
        	}
        }
	}
?>