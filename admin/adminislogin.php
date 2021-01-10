<?php
	session_start();
	if (isset($_GET['action']) && $_GET['action'] == 'logout') {
	    setcookie('adminname', '', time() - 1);
	    setcookie('adminpassword', '', time() - 1);
	    unset($_SESSION['admininfo']);
	    if(empty($_SESSION)) {
	        session_destroy();
	    }
	    header('Location: index.php');
	    exit;
	}
	if (isset($_SESSION['admininfo'])) {
	    $adminlogin = true;
	    $admininfo = $_SESSION['admininfo']; 
	} else {
	    $adminlogin = false;
	}
?>