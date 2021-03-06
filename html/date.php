<?php 
   include("conn.php");
   error_reporting(0); 
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
<!--	引用ueditor-->
	<link href="../umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
	<script type="text/javascript" src="../umeditor/third-party/jquery.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="../umeditor/ueditor.config.js"></script>
	<script type="text/javascript" charset="utf-8" src="../umeditor/ueditor.all.js"></script>
	<script type="text/javascript" src="lang/zh-cn/zh-cn.js"></script>
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
	<div class="container write-date">
       	<form action="../php/submit.php" name="myform" method="post" onsubmit="return checkPost()" enctype="multipart/form-data">
           <p><label>标题：</label><input type="text" class="txt-title" name="txt-title"/><span class="title-error">标题不得少于5个字</span></p>
           <!--<p><label></label><textarea cols="80" rows="30" name="content"></textarea><span class="title-error">不得为空</span></p>-->
			<script type="text/plain" id="myEditor" name="content" style="width:1000px;height:240px;">
                这里我可以写一些输入提示
            </script>
			<script type="text/javascript">
				var ue = UE.getEditor('myEditor');
			</script>
           <p><label></label><input type="submit" value="提交"/></p>
        </form>
	</div>	
	<footer>
		<p>@copyright by工程项目小分队</p>
		<p>2016-03-25</p>
		<p>河南省开封市河南大学计算机与信息工程学院</p>
	</footer>
	<!--<script type="text/javascript" src="../js/jQuery.js"></script>
	// <script type="text/javascript" src="../js/login.js"></script>-->
</body>
</html>