<?php
   include("conn.php");
   header('Content_Type:text/html;charset=utf-8'); 
   error_reporting(0);
   session_start();
   $localname = $_SESSION['username'];
   $id=$_GET['id'];
   if($id){
     $this_article = "select * from diary where id = '$id'";
   }else{
	   $this_article = "select * from diary";
   }
   $this_articleQuery = mysqli_query($conn,$this_article)or die(mysqli_error());
   $this_articleQueryList  = mysqli_fetch_array($this_articleQuery);
   $article = "select * from diary where username = '$localname'";
   $articleSql = mysqli_query($conn,$article) or die(mysqli_error());
   $articleSqlList  = mysqli_fetch_array($articleSql);
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<title>一起去旅行</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/self.css">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome-4.5.0/css/font-awesome.css">
</head>
<body>
	<header class="header community-header">
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
	<div class="container dateDetail">
		<div class="date_style date_list">
			<ul class="date_list_ul">
				<?php
                  while ($articleSqlList  = mysqli_fetch_array($articleSql)) {
				?>
				<li>
                    <ul>
                       <li><a href="myDate.php?id=<?php echo $articleSqlList[id]; ?>"><?php echo $articleSqlList[title]; ?></a><time><?php echo $articleSqlList[time]; ?></time></li>
                    </ul>					
				</li>
				<?php
				  }
				?>
			</ul>
		</div>
		<div class="date_style date_con">
			<article class="article">
				<h3><?php echo $this_articleQueryList[title]; ?><time><?php echo $this_articleQueryList[time]; ?></time></h3>
				<?php echo $this_articleQueryList[content]; ?>
			</article>
			<nav class="other_commit">
				<li><img src="../image/headimg.jpg"><b>啦啦啦</b>：<span>评论了什么评论了什么</span><time>2016-03-23</time></li>
				<li><img src="../image/headimg.jpg"><b>啦啦啦</b>：<span>评论了什么评论了什么</span><time>2016-03-23</time></li><li><img src="../image/headimg.jpg"><b>啦啦啦</b>：<span>评论了什么评论了什么</span><time>2016-03-23</time></li><li><img src="../image/headimg.jpg"><b>啦啦啦</b>：<span>评论了什么评论了什么</span><time>2016-03-23</time></li>
				<li><img src="../image/headimg.jpg"><b>啦啦啦</b>：<span>评论了什么评论了什么</span><time>2016-03-23</time></li>
				<li><img src="../image/headimg.jpg"><b>啦啦啦</b>：<span>评论了什么评论了什么</span><time>2016-03-23</time></li>
				<li><img src="../image/headimg.jpg"><b>啦啦啦</b>：<span>评论了什么评论了什么</span><time>2016-03-23</time></li>
				<li><img src="../image/headimg.jpg"><b>啦啦啦</b>：<span>评论了什么评论了什么</span><time>2016-03-23</time></li>
			</nav>
		</div>
	</div>
    <footer>
		<p>@copyright by工程项目小分队</p>
		<p>2016-03-25</p>
		<p>河南省开封市河南大学计算机与信息工程学院</p>
	</footer>
	<script type="text/javascript" src="../js/jQuery.js"></script>
	<script type="text/javascript" src="../js/style.js"></script>
</body>
</html>