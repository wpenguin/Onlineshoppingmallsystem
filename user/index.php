<?php
	require '../lib/init.lib.php';
	require 'userislogin.php';
	$bool = true;
	if (input_get('item') == 'all' || input_get('page') != null) {
		$bool = false;
		$page_size = 8;
		$res = db_query('select count(*) from t_commodity');
		if(!$res){
			exit(mysqli_error());
		}
		$count = mysqli_fetch_row($res);
		$count = $count[0];
		$max_page = ceil($count / $page_size);
		$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
		$page = $page > $max_page ? $max_page : $page;
		$page = $page < 1 ? 1 : $page;
		$page_html = "<a href='./index.php?page=1'>首页</a>&nbsp;";
		$page_html .= "<a href='./index.php?page=" . (($page-1) > 0 ? ($page-1) : 1)."'>上一页</a>&nbsp;";
		$page_html .= "<a href='./index.php?page=" . (($page+1) < $max_page ? ($page+1) : $max_page)."'>下一页</a>&nbsp;";
		$page_html .= "<a href='./index.php?page={$max_page}'>尾页</a>";
		$lim = ($page-1) * $page_size;
		$sql = "select * from t_commodity limit {$lim},{$page_size}";
		$res = db_fetch_all($sql);
		
		require 'index_top.php';
		
		require './view/index.html';
		
		require 'index_foot.php';
	}else{
		$bool = true;
		$sql = "select * from t_commodity order by hits desc limit 8";
		$res = db_fetch_all($sql);
		if(!$res){
			exit(mysqli_error());
		}
		
		require 'index_top.php';
	
		require './view/index.html';
		
		require 'index_foot.php';
	}
?>