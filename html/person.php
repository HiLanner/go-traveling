<?php
    include("conn.php");  
    session_start(); 
    error_reporting(0);
    $localname = $_SESSION['username'];
    $inforSql = "select * from user where username = '$localname'";
    $inforSqlQuery = mysql_query($inforSql);
    $resultArray = mysql_fetch_array($inforSqlQuery);
    //var_dump($resultArray);  
    //echo $resultArray[headimg];
    $localimg = $resultArray[headimg];
    $_SESSION['img'] = $localimg;
    $url ='<img src="../upload/'.$resultArray[headimg].'" />';
    $_SESSION['url'] = $url;
    $date = "select * from diary where username = '$localname'";
    $roadline = "select * from roadline where username = '$localname'";
    $tip = "select * from tip where username = '$localname'";
    $question = "select * from question where username = '$localname'";
    $dateSqlQuery = mysql_query($date) or die(mysql_error());
    $roadlineSqlQuery = mysql_query($roadline) or die(mysql_error());
    $tipSqlQuery = mysql_query($tip) or die(mysql_error());
    $questionSqlQuery = mysql_query($question) or die(mysql_error());
    $dateList = mysql_fetch_array($dateSqlQuery);
    $roadlineList = mysql_fetch_array($roadlineSqlQuery);
    $tipList = mysql_fetch_array($tipSqlQuery);
    $questionList = mysql_fetch_array($questionSqlQuery);
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
			<span class="user-info"><img src="../image/02.jpg">|<a href="login.php">登录</a></span>
			<?php
		}else{
			?>
			<span class="user-info"><img src="../image/02.jpg">|<a href="person.php"><?php echo $_SESSION['username']; ?></a></span>
			<?php
		}
		?>
		</div>
	</header>	
    <div class="img-show bgImg">
		<img src="../image/info01.jpeg"/>
	</div>
	<div class="container self-information">
       <div class="self self-basic">
       	 <div class="self-basic-top">
       	 	<div class="head-photo">
       	 		<?php echo $url; ?>
	       	 	<div class = "change">
	       	 		<p><a href="changeInformation.php">修改</a></p>
	       	 	</div>
       	 	</div>
       	 	<p><i class="fa fa-map"><?php echo $resultArray[username]; ?></i>&nbsp;&nbsp;<b>Lv20</b></p>
       	 </div>
	     <div class="sort self-hot-date">
	     	<h3><i class="fa fa-map"></i>我的热门游记</h3>
            <div class="left-img">
            	<img src="../image/02.jpg"/>
            </div>
            <div class="text-deraction">
            	特别好的地方，特别好的地方，特别好的地方,特别好的地方，特别好的地方，特别好的地方
            </div>
	     </div>
	     <div class="sort self-hot-tip">
	     	<h3>我的热门攻略</h3>
            <div class="text-deraction">
            	<span>D1 伏见稻荷大社(2小时) → 三十三间堂(1.5小时) → 锦市场(1.5小时) → 先斗町(1小时) → 鸭川(1小时)</span>
            </div>
            <div class="left-img">
            	<img src="../image/02.jpg"/>
            </div>
	     </div>
	     <div class="sort self-hot-discuss">
	     	<h3>我的热门回答</h3>
            <p class="my-question">Q:杭州哪里好玩？</p>
            <p class="my-answer">A:好吃的特别多</p>
	     </div>
	     <div class="sort self-hot-photo">	     	
	     	<h3>我的近照</h3>
	     	<img src="../image/02.jpg"/><img src="../image/02.jpg"/>
	     	<img src="../image/02.jpg"/><img src="../image/02.jpg"/>
	     </div>
       </div>
       <div class="self self-dt">
       	  <nav class="dt-nav">
       	  	<ul>
       	  		<li>游记</li>
       	  		<li>攻略</li>
       	  		<li>讨论</li>
       	  		<li>相册</li>
       	  	</ul>
       	  </nav>
       	  <div class="self-content dt-date">
       	  	<h3>我的游记<i class="fa fa-pencil" aria-hidden="true"><a href="Date.php">写游记</a></i></h3>
       	  	<?php
       	  	   while($dateList = mysql_fetch_array($dateSqlQuery)){
       	  	?>
       	  	<div class="sort dt-content">
	       	  	<div class="left-img">
	            	<img src="../image/02.jpg"/>
	            </div>
	            <div class="text-deraction">
	            	<h3><a href="myDate.php?id=<?php echo $dateList[id]; ?>"><?php echo ($dateList[title]);?></a><time><?php echo ($dateList[time]);?></time></h3>
	            	<?php echo $dateList[content]; ?>
	            </div>
            </div>
            <?php 
              } 
            ?>
            
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
          <div class="self-content dt-tips">
       	    <h3>我的攻略<i class="fa fa-pencil" aria-hidden="true"><a href="upload_roadline.php">写路线</a></i><i class="fa fa-pencil" aria-hidden="true"><a href="upload_tip.php">写攻略</a></i></h3>
       	  	<?php
       	  	   while($tipList = mysql_fetch_array($tipSqlQuery)){
       	  	?>
       	  	<div class="sort dt-content">
	            <div class="text-deraction">
	            	<h3><a href="#"><?php echo $tipList[interst]; ?></a><address><?php echo ($tipList[city])?></address><time><?php echo ($tipList[time])?></time></h3>
	            	<?php echo ($tipList[tipcontent])?>
	            </div>
	       	  	<div class="left-img">
	            	<img src="../image/02.jpg"/>
	            </div>
            </div>
            <?php 
              } 
            ?>
            
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
       	  <div class="self-content dt-discuss">
       	  	<div class="set-discuss">
       	  		<h3>我的讨论<i class="fa fa-pencil" aria-hidden="true"><a href="askQuestion.php">写问题</a></i></h3>
	       	  	<?php
       	  	    while($questionList = mysql_fetch_array($questionSqlQuery)){
       	  	    ?>
	       	  	<p class="my-question">Q:<?php echo($questionList[question]) ?><time><?php echo($questionList[time]) ?></time></p>
	            <p class="my-answer"><a href="#">A:</a>好吃的特别多</p>	       	  	
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
       	  <div class="self-content dt-pic">
       	  	<h3>我的相册<i class="fa fa-pencil" aria-hidden="true"><a href="upload_pic.php">上传图片</a></i></h3>
       	  	<ul>
              <li><img src="../image/02.jpg"/></li>
              <li><img src="../image/02.jpg"/></li>
              <li><img src="../image/02.jpg"/></li>
              <li><img src="../image/02.jpg"/></li>
              <li><img src="../image/02.jpg"/></li>
              <li><img src="../image/02.jpg"/></li>
              <li><img src="../image/02.jpg"/></li>
              <li><img src="../image/02.jpg"/></li>
       	  	</ul>
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
       <div class="clear"></div>
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