<?php
include("conn.php");
include("page.php");
include("search.php");
session_start();
error_reporting(0);
$localname = $_SESSION['username'];
$inforSql = "select * from user where username = '$localname'";
$inforSqlQuery = mysqli_query($conn,$inforSql);
$resultArray = mysqli_fetch_array($inforSqlQuery);
$localimg = $resultArray[headimg];
$tip = "select * from tip order by time desc";
$tipSqlQuery = mysqli_query($conn,$tip) or die(mysqli_error());
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
			</nav><?php
			if(!isset($_SESSION['username'])){
				//var_dump($_SESSION['username']) ;
				?>
				<span class="user-info"><a href="login.php">登录</a></span>
				<?php
			}else{
				?>
				<span class="user-info"><img src="../image/<?php echo($localimg) ?>">|<a href="person.php"><?php echo $_SESSION['username']; ?></a></span>
				<?php
			}
			?>
		</div>
	</header>
	<div class="img-content">
		<div class="img-show bgImg">
			<img src="../image/img3.jpeg"/>
		</div>		
		<div class="search tip-search">
			<nav>
				<ul class="choose_btn">
					<li>全部</li>
					<li>踏青</li>
					<li>赏花</li>
					<li>海岛</li>
					<li>爬山</li>
				</ul>
			</nav>
			<div class="clear"></div>
			<input name="text" type="text" value="我想去……" />&nbsp;&nbsp;<input name="search" type="button" value="搜索" />
		</div>
		<div class="hot hot-tip">
			<h1>武汉一日游</h1>
			<p>这里有最具风格的欧式建筑</p>
			<ul>
				<li>吃一吃户部巷的小吃</li>
				<li>登一登黄鹤楼俯瞰一下江川</li>
				<li>在江滩看一看漫天孔明灯</li>
			</ul>
		</div>
	</div>
	<div class="container tip-exam">
	    <h3>全部旅游攻略导航</h3>
		<div class="choose-place">
			<div class="left-place">
				地点
			</div>
			<div class="each-place">
				<a href="#">云南(26)</a>
	            <a href="#">四川(22)</a>
	            <a href="#">浙江(19)</a></li>
	            <a href="#">北京(18)</a></li>
	            <a href="#">江苏(18)</a></li>
	            <a href="#">广东(16)</a></li>
	            <a href="#">河北(16)</a></li>
	            <a href="#">台湾(16)</a></li>
	            <a href="#">内蒙古(13)</a></li>
	            <a href="#">贵州(12)</a></li>
	            <a href="#">山东(12)</a></li>
	            <a href="#">西藏(12)</a></li>
	            <a href="#">广西(11)</a></li>
	            <a href="#">青海(11)</a></li>
	            <a href="#">河南(10)</a></li>
	            <a href="#">江西(10)</a></li>
	            <a href="#">安徽(9)</a></li>
	            <a href="#">福建(9)</a>
	            <a href="#">吉林(9)</a>
	            <a href="#">新疆(9)</a>
	            <a href="#">海南(8)</a>
	            <a href="#">黑龙江(8)</a>
	            <a href="#">山西(8)</a>
	            <a href="#">陕西(8)</a>
	            <a href="#">湖北(7)</a>
	            <a href="#">甘肃(6)</a>
	            <a href="#">湖南(6)</a>
	            <a href="#">辽宁(6)</a>
	            <a href="#">上海(3)</a>
	            <a href="#">香港(3)</a>
	            <a href="#">重庆(3)</a>
	            <a href="#">澳门(2)</a>
	            <a href="#">宁夏(2)</a>
	            <a href="#">天津(2)</a>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="container hot-recomand">
	    <h3>热门推荐</h3>
		<div class="left recomand-left">
			<ul class="left-ul recomand-left-ul">
				<?php
				while($tipList = mysqli_fetch_array($tipSqlQuery)) {
					?>
					<li class="first first-recomand"><a href="#"><img src="<?php echo $tipList[img] ?>"></a>
						<ul>
							<li class="items items-recomand">
                            <span class="day">
                            	<em>乐</em>
                            	<br/>
                            	<strong>在</strong>
                            </span>
								<h3><?php echo $tipList[interst]?></h3>
								<p><?php echo $tipList[tipcontent] ?></p>
							</li>
						</ul>
					</li>
					<?php
				}
				?>
			</ul>
		</div>
	</div>
		<div class="clear"></div>
    <footer>
		<p>@copyright by工程项目小分队</p>
		<p>2016-03-25</p>
		<p>河南省开封市河南大学计算机与信息工程学院</p>
	</footer>
	<script type="text/javascript" src="../js/tab.js"></script>
	<script type="text/javascript" src="../js/jQuery.js"></script>
	<script type="text/javascript" src="../js/roadLine.js"></script>
	<script type="text/javascript" src="../js/style.js"></script>
</body>
</html>