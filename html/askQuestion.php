<?php
   error_reporting(0);
   include("conn.php");
   header('Content_Type:text/html;charset=utf-8'); 
   session_start();
   $username = $_SESSION['username'];
      
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<title>一起去旅行</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">	
	<link rel="stylesheet" type="text/css" href="../css/self.css">	
	<link rel="stylesheet" type="text/css" href="../css/font-awesome-4.5.0/css/font-awesome.css">
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
    <div class="img-show bgImg">
		<img src="../image/info01.jpeg"/>
	</div>
	<div class="container ask-question">
       	<form action="../php/submit.php" name="myform" method="post" onsubmit="return checkPost()" enctype="multipart/form-data">
           <p><label></label><input type="text" name="question"/></p>
           <p><label></label><input type="submit" value="发布"/></p>
        </form>
	</div>	
	<footer>
		<p>@copyright by工程项目小分队</p>
		<p>2016-03-25</p>
		<p>河南省开封市河南大学计算机与信息工程学院</p>
	</footer>
	<script type="text/javascript" src="../js/jQuery.js"></script>
	<script type="text/javascript" src="../js/login.js"></script>
</body>
</html>