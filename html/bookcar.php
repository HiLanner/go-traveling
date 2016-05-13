<?php
error_reporting(0);
include ("conn.php");
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<title>一起去旅行</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<header class="header">
		<div class="container">
		    <img class="logo" src="../image/02.jpg"/>
			<nav class="top-nav">
				<ul>
					<li><a href="index.php">首页</a></li>
		            <li><a href="destination.php">目的地</a></li>
		            <li><a href="tips.php">攻略</a></li>
		            <li><a href="shop.php">商城</a></li>
		            <li><a href="community.php">社区</a></li>
				</ul>
			</nav>
			<span class="login"><a href="login.php">登录</a>|<a href="register.php">注册</a></span>
		</div>
	</header>
	<div class="img-content">
		<div class="img-show bgImg">
			<img src="../image/shopImg.jpeg"/>
		</div>		
		<div class="search tip-search">
			<nav>
				<ul class="choose_btn">
					<li>热门</li>
					<li>北京</li>
					<li>上海</li>
					<li>杭州</li>
				</ul>
			</nav>
			<div class="clear"></div>
			<input name="text" type="text" value="请输入城市" />&nbsp;&nbsp;<input name="search" type="button" value="搜索" />
		</div>
	</div>
	<div class="container shopping">
		<div class="shopping shopHotel hotel">
			<h3><a href="bookcar.php">租车推荐</a></h3>
			<?php
			$sqlCar = "select * from merchant where sorts = 'car'";
			$sqlCarQuery = mysqli_query($conn, $sqlCar) or die(mysqli_errno());
			?>
			<ul class="list">
				<?php
				while ($sqlCarResult = mysqli_fetch_array($sqlCarQuery)) {
					?>
					<li>
						<div class="items-img">
							<img src="<?php echo $sqlCarResult[img] ?>"/>
						</div>
						<div class="items-intro">
							<span><?php echo $sqlCarResult[describtion] ?><a href="#">购买</a></span>
						</div>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
    <footer>
		<p>@copyright by工程项目小分队</p>
		<p>2016-03-25</p>
		<p>河南省开封市河南大学计算机与信息工程学院</p>
	</footer>
	<script type="text/javascript" src="../js/tab.js"></script>
	<script type="text/javascript" src="../js/jQuery.js"></script>
	<script type="text/javascript" src="../js/style.js"></script>
	<script type="text/javascript" src="../js/roadLine.js"></script>
</body>
</html>