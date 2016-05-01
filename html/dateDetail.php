<?php
   include("conn.php");
   header('Content_Type:text/html;charset=utf-8'); 
   error_reporting(0);
   session_start();
   $localname = $_SESSION['username'];
   $inforSql = "select * from user where username = '$localname'";
   $inforSqlQuery = mysql_query($inforSql);
   $resultArray = mysql_fetch_array($inforSqlQuery);
   $localimg = $resultArray[headimg];
   $id=$_GET['id'];
   $this_article = "select * from diary where id = '$id'";
   $this_articleQuery = mysql_query($this_article)or die(mysql_errno());
   $this_articleQueryList  = mysql_fetch_array($this_articleQuery);
   //var_dump(expression);
   $article = "select * from diary";
   $articleSql = mysql_query($article) or die(mysql_error());
   $articleSqlList  = mysql_fetch_array($articleSql);
   $commit = "select * from commit where article_id = '$id'";
   $commitQuery = mysql_query($commit);
   $resultRows = mysql_fetch_array($commitQuery);
   $commit_num = mysql_num_rows($commitQuery);
   // 提交评论

   $commit = $_POST['commitcontent'];
   $submitSql = "insert into commit(commitcontent,username,article_id,time) values ('$commit','$localname','$id',now())";
   $submitQuery = mysql_query($submitSql) or die(mysql_error());
   if(!$commitQuery){
      echo "shibai";
   };
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
		            <li><a href="destination.php">目的地</a></li>
		            <li><a href="tips.php">攻略</a></li>
		            <li><a href="shop.php">商城</a></li>
		            <li><a href="community.php">社区</a></li>
				</ul>
			</nav>
			<?php
			  if(!isset($_SESSION['username'])){
			  	var_dump($_SESSION['username']) ;
			?>
			<span class="login"><a href="login.php">登录</a>|<a href="register.php">注册</a></span>
			<?php
		}else{
			?>
			<span class="user-info"><img src="../image/<?php echo($localimg) ?>">|<a href="person.php"><?php echo $_SESSION['username']; ?></a></span>
			<?php
		}
		?>			
		</div>
	</header>
	<div class="container dateDetail">
		<div class="date_style date_list">
			<ul>
				<li>
					<i class="fa fa-pencil-square-o"></i>文章分类
                    <ul>
                    	<?php
                           while ($articleSqlList  = mysql_fetch_array($articleSql)) {
                    	?>
                       <li><a href="#"><?php echo($articleSqlList[title]) ?></a><time><?php echo($articleSqlList[time]) ?></time></li>
                       <?php 
                         }
                        ?>
                    </ul>					
				</li>
				<li>
					<i class="fa fa-pencil-square-o"></i>文章分类
                    <ul>
                       <li><a href="#">文章标题</a><time>2016-03-23</time></li>
                    </ul>					
				</li>
				<li>
					<i class="fa fa-pencil-square-o"></i>文章分类
                    <ul>
                       <li><a href="#">文章标题</a><time>2016-03-23</time></li>
                    </ul>					
				</li>
				<li>
					<i class="fa fa-pencil-square-o"></i>文章分类
                    <ul>
                       <li><a href="#">文章标题</a><time>2016-03-23</time></li>
                    </ul>					
				</li>
				<li>
					<i class="fa fa-pencil-square-o"></i>文章分类
                    <ul>
                       <li><a href="#">文章标题</a><time>2016-03-23</time></li>
                    </ul>					
				</li>
				<li>
					<i class="fa fa-pencil-square-o"></i>文章分类
                    <ul>
                       <li><a href="#">文章标题</a><time>2016-03-23</time></li>
                    </ul>					
				</li>
			</ul>
		</div>
		<div class="date_style date_con">
			<article class="article">
				<h3><?php echo($this_articleQueryList[title]) ?><time><?php echo($this_articleQueryList[time]) ?></time><b>赞(<?php echo($this_articleQueryList[zancount]) ?>)</b><b>评论(<?php echo($this_articleQueryList[commitcount]) ?>)</b></h3>
				<?php echo($this_articleQueryList[content]) ?>
			</article>
			<div class="self_commit">
				<form  name="myform" method="post" >
                    <label><input type="text" name="commitcontent" /></label>
                    <label><input type="submit" value="评论" /></label>
                    <label><input type="button" value="点赞" /></label>
				</form>
			</div>
			<nav class="other_commit">
				<?php 
                    while ($resultRows = mysql_fetch_array($commitQuery)) {
                       	$commituser = "select * from user where username = '$resultRows[username]'";
						$commituserQuery = mysql_query($commituser)or die(mysql_error());
					    $resultuserRows = mysql_fetch_array($commituserQuery);
				 ?>
				<li><img src="../image/<?php echo($resultuserRows[headimg]); ?>"/><b><?php echo($resultRows[username]) ?></b>：<span><?php echo($resultRows[commitcontent]) ?></span><time><?php echo($resultRows[time]) ?></time></li>
				<?php
				}
				?>
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