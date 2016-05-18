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
					<li><a href="roadline.php">目的地</a></li>
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
					<li>全部</li>
					<li>特产</li>
					<li>酒店</li>
					<li>租车</li>
				</ul>
			</nav>
			<div class="clear"></div>
			<input name="text" type="text" value="我想去……" />&nbsp;&nbsp;<input name="search" type="button" value="搜索" />
		</div>
		<div class="hot hot-tip">
			<h1>武汉一日游</h1>
			<p>吃、穿、住、行，样样精通</p>
			<ul>
				<li>最好吃的</li>
				<li>最好玩的</li>
				<li>最舒服的</li>
			</ul>
		</div>
	</div>
	<div class="container shopping">
		<div class="shopping shopHotel">
		    <h3><a href="hotel.php">酒店推荐</a></h3>
			<?php
			     $sqlHotel = "select * from merchant where sorts = 'hotel'";
			     $sqlHotelQuery = mysqli_query($conn,$sqlHotel) or die(mysqli_errno());
			?>
			<ul class="list">
				<?php
                   while($sqlHotelResult = mysqli_fetch_array($sqlHotelQuery)) {
					   ?>
					   <li>
						   <div class="items-img"><img src="<?php echo $sqlHotelResult[img]?>"/>
						   </div>
						   <div class="items-intro">
							   <span><?php echo $sqlHotelResult[describtion] ?></span>
						   </div>
					   </li>
					   <?php
				   }
				?>
			</ul>
		</div>
		<div class="shopping shopSpeciality">
		    <h3><a href="specialty.php">特产路线</a></h3>
			<?php
			$sqlSpecialty = "select * from merchant where sorts = 'specialty'";
			$sqlSpecialtyQuery = mysqli_query($conn,$sqlSpecialty) or die(mysqli_errno());
			?>
			<ul class="list">
				<?php
				while($sqlSpecialtyResult = mysqli_fetch_array($sqlSpecialtyQuery)) {
				?>
				<li>
					<div class="items-img">
						<img src="<?php echo $sqlSpecialtyResult[img] ?>"/>
					</div>
					<div class="items-intro">
						<span><?php echo $sqlSpecialtyResult[describtion] ?></span>
					</div>
				</li>
					<?php
				 }
				?>
			</ul>
		</div>
		<div class="shopping shopCar">
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
								<span><?php echo $sqlCarResult[describtion] ?></span>
							</div>
						</li>
					<?php } ?>
				</ul>
		</div>
	</div>
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