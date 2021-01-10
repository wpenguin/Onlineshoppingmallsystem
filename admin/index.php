<?php
	require '../lib/init.lib.php';
	require 'adminislogin.php';
	
	$ll = null;
	
	//管理员
	$adminres = db_fetch_row('select * from t_admin');
	
	//员工
	$userpage_size = 6;
	$userres = db_query('select count(*) from t_users');
	if(!$userres){
		exit(mysqli_error());
	}
	$usercount = mysqli_fetch_row($userres);
	$usercount = $usercount[0];
	$usermax_page = ceil($usercount / $userpage_size);
	$userpage = isset($_GET['userpage']) ? intval($_GET['userpage']) : 1;
	$userpage = $userpage > $usermax_page ? $usermax_page : $userpage;
	$userpage = $userpage < 1 ? 1 : $userpage;
	$userpage_html = "<a href='./index.php?userpage=1'>首页</a>&nbsp;";
	$userpage_html .= "<a href='./index.php?userpage=" . (($userpage-1) > 0 ? ($userpage-1) : 1)."'>上一页</a>&nbsp;";
	$userpage_html .= "<a href='./index.php?userpage=" . (($userpage+1) < $usermax_page ? ($userpage+1) : $usermax_page)."'>下一页</a>&nbsp;";
	$userpage_html .= "<a href='./index.php?userpage={$usermax_page}'>尾页</a>";
	$userlim = ($userpage-1) * $userpage_size;
	$sql = "select * from t_users limit {$userlim},{$userpage_size}";
	$userres = db_fetch_all($sql);
	
	//商品
	$itempage_size = 3;
	$itemres = db_query('select count(*) from t_commodity');
	if(!$itemres){
		exit(mysqli_error());
	}
	$itemcount = mysqli_fetch_row($itemres);
	$itemcount = $itemcount[0];
	$itemmax_page = ceil($itemcount / $itempage_size);
	$itempage = isset($_GET['itempage']) ? intval($_GET['itempage']) : 1;
	$itempage = $itempage > $itemmax_page ? $itemmax_page : $itempage;
	$itempage = $itempage < 1 ? 1 : $itempage;
	$itempage_html = "<a href='./index.php?itempage=1'>首页</a>&nbsp;";
	$itempage_html .= "<a href='./index.php?itempage=" . (($itempage-1) > 0 ? ($itempage-1) : 1)."'>上一页</a>&nbsp;";
	$itempage_html .= "<a href='./index.php?itempage=" . (($itempage+1) < $itemmax_page ? ($itempage+1) : $itemmax_page)."'>下一页</a>&nbsp;";
	$itempage_html .= "<a href='./index.php?itempage={$itemmax_page}'>尾页</a>";
	$itemlim = ($itempage-1) * $itempage_size;
	$sql = "select * from t_commodity limit {$itemlim},{$itempage_size}";
	$itemres = db_fetch_all($sql);
	
	//商品详情
	$cid = (int)input_get('cid');
	if(!empty($cid)){
		$sql = "select * from t_commodity where id=$cid";
		$crow = db_fetch_row($sql);
	}
	
	//订单
	$boolean = input_get('boolean');
	
	if(($boolean == null || $boolean == 'all' || input_get('allpage') != null) && input_get('falsepage') == null && input_get('turepage') == null){
		$allpage_size = 3;
		$allres = db_query('select count(*) from t_orders');
		if(!$allres){
			exit(mysqli_error());
		}
		$allcount = mysqli_fetch_row($allres);
		$allcount = $allcount[0];
		$allmax_page = ceil($allcount / $allpage_size);
		$allpage = isset($_GET['allpage']) ? intval($_GET['allpage']) : 1;
		$allpage = $allpage > $allmax_page ? $allmax_page : $allpage;
		$allpage = $allpage < 1 ? 1 : $allpage;
		$allpage_html = "<a href='./index.php?allpage=1'>首页</a>&nbsp;";
		$allpage_html .= "<a href='./index.php?allpage=" . (($allpage-1) > 0 ? ($allpage-1) : 1)."'>上一页</a>&nbsp;";
		$allpage_html .= "<a href='./index.php?allpage=" . (($allpage+1) < $allmax_page ? ($allpage+1) : $allmax_page)."'>下一页</a>&nbsp;";
		$allpage_html .= "<a href='./index.php?allpage={$allmax_page}'>尾页</a>";
		$alllim = ($allpage-1) * $allpage_size;
		$sql = "select * from t_orders limit {$alllim},{$allpage_size}";
		$allres = db_fetch_all($sql);
		$orderrows = array();
		foreach($allres as $r){
			$cid = $r['cid'];
			$cname = db_fetch_column("select commodityname from t_commodity where id=$cid");
			array_push($r,$cname);
			array_push($orderrows,$r);
		}
	}else if($boolean == 'false' || input_get('falsepage') != null){
		$falsepage_size = 3;
		$falseres = db_query('select count(*) from t_orders where state=0');
		if(!$falseres){
			exit(mysqli_error());
		}
		$falsecount = mysqli_fetch_row($falseres);
		$falsecount = $falsecount[0];
		$falsemax_page = ceil($falsecount / $falsepage_size);
		$falsepage = isset($_GET['falsepage']) ? intval($_GET['falsepage']) : 1;
		$falsepage = $falsepage > $falsemax_page ? $falsemax_page : $falsepage;
		$falsepage = $falsepage < 1 ? 1 : $falsepage;
		$falsepage_html = "<a href='./index.php?falsepage=1'>首页</a>&nbsp;";
		$falsepage_html .= "<a href='./index.php?falsepage=" . (($falsepage-1) > 0 ? ($falsepage-1) : 1)."'>上一页</a>&nbsp;";
		$falsepage_html .= "<a href='./index.php?falsepage=" . (($falsepage+1) < $falsemax_page ? ($falsepage+1) : $falsemax_page)."'>下一页</a>&nbsp;";
		$falsepage_html .= "<a href='./index.php?falsepage={$falsemax_page}'>尾页</a>";
		$falselim = ($falsepage-1) * $falsepage_size;
		$sql = "select * from t_orders where state=0 limit {$falselim},{$falsepage_size}";
		$falseres = db_fetch_all($sql);
		$orderrows = array();
		foreach($falseres as $r){
			$cid = $r['cid'];
			$cname = db_fetch_column("select commodityname from t_commodity where id=$cid");
			array_push($r,$cname);
			array_push($orderrows,$r);
		}
	}else if($boolean == 'ture'  || input_get('turepage') != null){
		$turepage_size = 3;
		$tureres = db_query('select count(*) from t_orders where state=1');
		if(!$tureres){
			exit(mysqli_error());
		}
		$turecount = mysqli_fetch_row($tureres);
		$turecount = $turecount[0];
		$turemax_page = ceil($turecount / $turepage_size);
		$turepage = isset($_GET['turepage']) ? intval($_GET['turepage']) : 1;
		$turepage = $turepage > $turemax_page ? $turemax_page : $turepage;
		$turepage = $turepage < 1 ? 1 : $turepage;
		$turepage_html = "<a href='./index.php?turepage=1'>首页</a>&nbsp;";
		$turepage_html .= "<a href='./index.php?turepage=" . (($turepage-1) > 0 ? ($turepage-1) : 1)."'>上一页</a>&nbsp;";
		$turepage_html .= "<a href='./index.php?turepage=" . (($turepage+1) < $turemax_page ? ($turepage+1) : $turemax_page)."'>下一页</a>&nbsp;";
		$turepage_html .= "<a href='./index.php?turepage={$turemax_page}'>尾页</a>";
		$turelim = ($turepage-1) * $turepage_size;
		$sql = "select * from t_orders where state=1 limit {$turelim},{$turepage_size}";
		$tureres = db_fetch_all($sql);
		$orderrows = array();
		foreach($tureres as $r){
			$cid = $r['cid'];
			$cname = db_fetch_column("select commodityname from t_commodity where id=$cid");
			array_push($r,$cname);
			array_push($orderrows,$r);
		}
	}
	
	require 'index_top.php';
	require './view/index.html';
?>