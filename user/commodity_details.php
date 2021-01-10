<?php
	require '../lib/init.lib.php';
	session_start();
	if (isset($_GET['action']) && $_GET['action'] == 'logout') {
	    setcookie('username', '', time() - 1);
	    setcookie('password', '', time() - 1);
	    unset($_SESSION['userinfo']);
	    if(empty($_SESSION)) {
	        session_destroy();
	    }
	    header('Location: index.php');
	    exit;
	}
	if (isset($_SESSION['userinfo'])) {
	    $login = true;
	    $userinfo = $_SESSION['userinfo']; 
	    $username = $userinfo['username'];
	    $sql = "select id from t_users where username='$username'";
	    $userid = db_fetch_column($sql);
	    $sql = "select * from t_user_information where userid=$userid";
	    $row = db_fetch_row($sql);
	} else {
	    $login = false;
	}
	$id = input_get('id');
	$hits = input_get('hits')+1;
	$sql = "update t_commodity set hits = $hits where id = $id";
	db_query($sql);
	$sql = "select * from t_commodity where id = $id";
	$res = db_fetch_row($sql);
	require 'index_top.php';
	require './view/commodity_details.html';
	require 'index_foot.php';
?>