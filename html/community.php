<?php
include("conn.php");
session_start();
error_reporting(0);
$questionSql = "select * from question order by time desc";
$questionSqlQuery = mysqli_query($conn,$questionSql)or die(mysqli_error($conn));

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
	<div class="container community">
		<div class="all-question">
			<div class="search-question">
				<input type="text"/><input name="search" type="button" value="搜索" />
			</div>
			<div class="hot-question">
				<h3>热门问题</h3>
				<ul>
					<?php
					$shortQuestionSql = "select * from question order by time desc limit 0,4";
					$shortQuestionSqlQuery = mysqli_query($conn,$shortQuestionSql)or die(mysqli_error($conn));
					while($questionList = mysqli_fetch_array($shortQuestionSqlQuery)) {
						?>
						<li class="hot-question-li"><a href="javascript:void(0)"><?php echo $questionList[question]; ?></a>
						<div class="reply">
							<form action="../php/submit.php?id=<?php echo $questionList[id]?>" method="post">
								<input type="text" name="answer" placeholder="发表一下你的见解吧~" />
								<input type="submit" value="回答" />
							</form>
						</div>
						</li>
						<?php
					}
					?>
				</ul>
			</div>
			<div class="sorts-question">
				<nav>
					<ul>
						<li>所有问答</li>
						<li>热门问答</li>
						<li>最新问答</li>
						<li>待回答</li>
					</ul>
				</nav>
				<div class="answers all-answer">
					<?php
					  while($questionList = mysqli_fetch_array($questionSqlQuery)) {
						  $questionUserSql = "select * from user where username = '$questionList[username]'";
						  $questionUserSqlQuery = mysqli_query($conn,$questionUserSql)or die(mysqli_error($conn));
						  $questionUserResult = mysqli_fetch_array($questionUserSqlQuery);
						  $answerSql = "select * from answer where questionid = '$questionList[id]' order by support limit 0,1";
						  $answerSqlQuery = mysqli_query($conn,$answerSql)or die(mysqli_error($conn));

						  $answerResult = mysqli_fetch_array($answerSqlQuery);
						  $answerUserSql = "select * from user where username = '$answerResult[username]'";
						  $answerUserSqlQuery = mysqli_query($conn,$answerUserSql)or die(mysqli_error($conn));;
						  $answerUserResult = mysqli_fetch_array($answerSqlQuery);
						  ?>
						  <div class="detail-question">
							  <div class="wenti"><img src="<?php echo $questionUserResult[headimg];?>"><a href="#"><?php echo $questionList[username];?></a>
								  <span><?php echo $questionList[question]; ?></span></div>
							  <div class="clear"></div>
							  <div class="da">
								  <div class="da-text">
									  <p><?php echo $answerResult[answer]?></p>
								  </div>
							  </div>
							  <div class="user-info">
								  <?php
								    if ($answerResult) {
										?>
										<a href="#"><?php echo $answerUserResult[username] ?></a><a href="#">lv19</a>
										<?php
									}
								  ?>
							  </div>
							  <div class="tag">
								  <ul>
									  <li>2015-10-10</li>
									  <li>有用</li>
									  <li>反对</li>
									  <li>浏览</li>
								  </ul>
							  </div>
						  </div>
						  <?php
					  }
					?>
				</div>
				<div class="digg"> 
		        <span class="disabled">&lt; </span>
		        <span class="current">1</span>
		        <a href="#?page=2">2</a>
		        <a href="#?page=3">3</a>
		        <a href="#?page=4">4</a>
		        <a href="#?page=5">5</a>
		        <a href="#?page=6">6</a>
		        <a href="#?page=7">7</a>
		        ...
		        <a href="#?page=199">199</a>
		        <a href="#?page=200">200</a>
		        <a href="#?page=2"> 
		        &gt; </a>
             </div> 
			</div>
		</div>
		<div class="hot-user">
		    <div class="write-question">
		    	<a href="#">写游记</a>
		    </div>
			<h3>热门回答排行</h3>
		    <nav class="hot-user-nav">
		    	<ul>
		    		<li>排名</li>
		    		<li>用户</li>
		    		<li>回答数</li>
		    	</ul>
		    </nav>
			<ul class="hot-user-ul">
				<li>
					<em class="num">1</em>
					<div class="hot-user-info">
						<a class="avatar"><img src="../image/headimg.jpg"></a>
						<span class="name">啊啊啊</span>
						<span class="level">lv.25</span>
					</div>
					<span class="answer-num">35</span>
				</li>
				<li>
					<em class="num">1</em>
					<div class="hot-user-info">
						<a class="avatar"><img src="../image/headimg.jpg"></a>
						<span class="name">啊啊啊</span>
						<span class="level">lv.25</span>
					</div>
					<span class="answer-num">35</span>
				</li>
				<li>
					<em class="num">1</em>
					<div class="hot-user-info">
						<a class="avatar"><img src="../image/headimg.jpg"></a>
						<span class="name">啊啊啊</span>
						<span class="level">lv.25</span>
					</div>
					<span class="answer-num">35</span>
				</li>
				<li>
					<em class="num">1</em>
					<div class="hot-user-info">
						<a class="avatar"><img src="../image/headimg.jpg"></a>
						<span class="name">啊啊啊</span>
						<span class="level">lv.25</span>
					</div>
					<span class="answer-num">35</span>
				</li>
				<li>
					<em class="num">1</em>
					<div class="hot-user-info">
						<a class="avatar"><img src="../image/headimg.jpg"></a>
						<span class="name">啊啊啊</span>
						<span class="level">lv.25</span>
					</div>
					<span class="answer-num">35</span>
				</li>
				<li>
					<em class="num">1</em>
					<div class="hot-user-info">
						<a class="avatar"><img src="../image/headimg.jpg"></a>
						<span class="name">啊啊啊</span>
						<span class="level">lv.25</span>
					</div>
					<span class="answer-num">35</span>
				</li>
				<li>
					<em class="num">1</em>
					<div class="hot-user-info">
						<a class="avatar"><img src="../image/headimg.jpg"></a>
						<span class="name">啊啊啊</span>
						<span class="level">lv.25</span>
					</div>
					<span class="answer-num">35</span>
				</li>
				<li>
					<em class="num">1</em>
					<div class="hot-user-info">
						<a class="avatar"><img src="../image/headimg.jpg"></a>
						<span class="name">啊啊啊</span>
						<span class="level">lv.25</span>
					</div>
					<span class="answer-num">35</span>
				</li>
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
</body>
</html>