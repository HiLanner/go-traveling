<?php
include("conn.php");
//error_reporting(0);
session_start();
$username = $_SESSION['username'];
$content = $_POST['content'];
echo $username;
$picSql = "insert into picture(username,pic,time) values ('$username','$content',now())";
$picQuery = mysqli_query($conn,$picSql) or die(mysqli_error());
mysqli_close($conn);
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
	<div class="container upload-photo" style="border: none">
       	<form action="" name="myform" method="post" onsubmit="return checkPost()" enctype="multipart/form-data">

			<script type="text/plain" id="myEditor" name="content" style="width:1000px;height:240px;">
                按ctrl选择更多选择图片
            </script>

			<script type="text/javascript">
				var ue = UE.getEditor('myEditor',{

					toolbars:[['insertimage']]
				});
//				function editor()
			</script>
			<p><label></label><input type="submit" value="提交"/></p>

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