<link rel="stylesheet" href="css/index.css" />
<!--<script src="js/index.js" type="text/javascript" charset="utf-8"></script>-->
<div id="top">
	<div id="top_head">
		<div id="top_head_box">
			<?php if($login): ?>
				<ul>
					<li>
						<span class="a" style="color: #000;">当前用户:"<?php echo $userinfo['username']; ?>"</span>
						<span class="l">|</span>
						<a href="information.php?uid=<?php echo $userinfo['id']; ?>" class="a">我的信息</a>
						<span class="l">|</span>
						<a href="shopping_cart.php?userid=<?php echo $userinfo['id']; ?>" class="a">购物车</a>
						<span class="l">|</span>
						<a href="my_order.php?userid=<?php echo $userinfo['id']; ?>" class="a">我的订单</a>
						<span class="l">|</span>
						<a class="a" href="?action=logout">退出</a>
					</li>
				</ul>
			<?php else: ?>
				<ul>
					<li>
						<a href="login.php" id="login" class="a">您好，请登录</a>
						<span class="l">|</span>
						<a href="regist.php" id="regist" class="a">立即注册</a>
						<span class="l">|</span>
						<a href="login.php" class="a">购物车</a>
						<span class="l">|</span>
						<a href="login.php" class="a">我的订单</a>
					</li>
				</ul>
			<?php endIf; ?>
		</div>
	</div>
	<div id="top_body">
		<div class="search_m">
			<div id="" class="search_box">
				<input type="text" class="search_text" name="" id="" value="" />
				<!--<label id="" class="search_font">樱花自营店</label>-->
				<button type="button" class="search_button" name="" id="" value="">
					<i style="font-size: 16px;">搜索</i>
				</button>
			</div>
			<div id="" class="cart_box">
				<div id="" class="cart">
					<?php if($login){ ?>
						<a href="shopping_cart.php?userid=<?php echo $userinfo['id']; ?>" class="mycart">我的购物车</a>
					<?php }else{ ?>
						<a href="login.php" class="mycart">我的购物车</a>
					<?php } ?>
				</div>
			</div>
		</div>
		<div id="" class="ol">
			<ul>
				<li><a href="index.php" class="lia" style="color: red;"><b>首页</b></a></li>
				<li><a href="index.php?item=all" class="lia" style="color: red;"><b>全部商品</b></a></li>
				<li><a href="" class="lia" style="color: red;"><b>秒杀</b></a></li>
				<li><a href="" class="lia"><b>优惠券</b></a></li>
				<li><a href="" class="lia"><b>会员中心</b></a></li>
				<li><a href="" class="lia"><b>拍卖中心</b></a></li>
			</ul>
		</div>
	</div>
</div>
