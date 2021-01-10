<link rel="stylesheet" href="./css/index.css" />
<div id="top">
	<div id="top_head">
		<div id="top_head_box">
			<?php if($adminlogin): ?>
				<ul>
					<li>
						<span class="a" style="color: #000;">管理员:"<?php echo $admininfo['adminname']; ?>"</span>
						<span class="l">|</span>
						<a href="index.php?itempage=1" class="a" id="com">商品管理</a>
						<span class="l">|</span>
						<a href="index.php?userpage=1" class="a" id="user">用户管理</a>
						<span class="l">|</span>
						<a href="index.php?boolean=all" class="a" id="order">订单管理</a>
						<span class="l">|</span>
						<a class="a" href="?action=logout">退出</a>
					</li>
				</ul>
			<?php else: ?>
				<ul>
					<li>
						<a href="" class="a" id="logining">管理员登录</a>
						<span class="l">|</span>
						<a href="" style="color: #E1251B;" class="a">忘记密码</a>
						<span class="l">|</span>
						<a href="" class="a">修改密码</a>
					</li>
				</ul>
			<?php endIf; ?>
		</div>
	</div>
</div>
