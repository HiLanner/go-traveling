<?php
include("conn.php");
session_start();
error_reporting(0);
$localname = $_SESSION['username'];
$inforSql = "select * from user where username = '$localname'";
$inforSqlQuery = mysqli_query($conn,$inforSql);
$resultArray = mysqli_fetch_array($inforSqlQuery);
$localimg = $resultArray[headimg];
$_SESSION['img'] = $localimg;
$url ='<img src="../upload/'.$resultArray[headimg].'" />';
$_SESSION['url'] = $url;
$tip = "select * from tip where username = '$localname'";
$tipSqlQuery = mysqli_query($conn,$tip) or die(mysqli_error($conn));
$tipList = mysqli_fetch_array($tipSqlQuery);
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<title>一起去旅行</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/self.css">
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
			<?php
			if(!isset($_SESSION['username'])){
				var_dump($_SESSION['username']) ;
				?>
				<span class="user-info"><img src="../image/02.jpg">|<a href="login.php">登录</a></span>
				<?php
			}else{
				?>
				<span class="user-info"><?php echo $_SESSION['url']; ?>|<a href="person.php"><?php echo $_SESSION['username']; ?></a></span>
				<?php
			}
			?>
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
		<div class="shopping roadline">
		    <h3>攻略推荐</h3>
			<ul class="roadline-ul">
				<?php while($tipList = mysqli_fetch_array($tipSqlQuery)){

					?>
               <li class="roadline-ul-li">
                  <div class="city-img"><img src="<?php echo $tipList[img]?>" /></div>
                  <div class="day-detail"><p><?php echo $tipList[tipcontent] ?></p></div>
               </li>
				<?php
				}
				?>
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