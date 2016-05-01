<?php
    include("conn.php"); 
    include("page.php"); 
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
    $date = "select * from diary";
    $roadline = "select * from roadline";
    $tip = "select * from tip";
    $question = "select * from question where username = '$localname'";
    $dateSqlQuery = mysql_query($date) or die(mysql_error());
    $roadlineSqlQuery = mysql_query($roadline) or die(mysql_error());
    $tipSqlQuery = mysql_query($tip) or die(mysql_error());
    $questionSqlQuery = mysql_query($question) or die(mysql_error());
    $dateList = mysql_fetch_array($dateSqlQuery);
    $roadlineList = mysql_fetch_array($roadlineSqlQuery);
    $tipList = mysql_fetch_array($tipSqlQuery);
    $questionList = mysql_fetch_array($questionSqlQuery);

  
    
    $page = $_GET["page"];
    $page_size = 4;
    $rows = mysql_num_rows($dateSqlQuery);
    //echo $rows;
    Page($rows,$page_size);
	$sql = "select * from diary limit $select_from $select_limit";
    $rst = mysql_query($sql) or die(mysql_error());

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
		<div class="img-show">
			<ul id="img-show-li">
				<li><img src="../image/img1.jpeg"/></li>
				<li><img src="../image/img2.jpeg"/></li>
				<li><img src="../image/img3.jpeg"/></li>
				<li><img src="../image/img2.jpeg"/></li>
			</ul>
		</div>
		<nav class="nav-btn">
			<ul id="nav-btn-li">
				<li><img class="img_here" src="../image/img1.jpeg"/></li>
				<li><img src="../image/img2.jpeg"/></li>
				<li><img src="../image/img3.jpeg"/></li>
				<li><img src="../image/img2.jpeg"/></li>
			</ul>
		</nav>
		<div class="search">
			<nav>
				<ul class="choose_btn">
					<li>全部</li>
					<li>目的地</li>
					<li>商城</li>
					<li>攻略</li>
				</ul>
			</nav>
			<div class="clear"></div>
			<input name="text" type="text" />&nbsp;&nbsp;<input name="search" type="button" value="搜索" />
		</div>
	</div>
	<div class="container main">
		<div class="place-tip-shop">
			<div class="place">
				<header class="recomand place_recomand"><span>旅游地点推荐</span><a href="#">更多</a></header>
				<dl>
					<dt><img src="../image/reconmand02.png"></dt>
					<dd>
						<h3>云南</h3>
						<p>这是一个很美的地方</p>
						<p>这是一个很美的地方</p>
					</dd>
				</dl>
				<dl>
					<dt><img src="../image/reconmand02.png"></dt>
					<dd>
						<h3>云南</h3>
						<p>这是一个很美的地方</p>
						<p>这是一个很美的地方</p>
					</dd>
				</dl>
				<dl>
					<dt><img src="../image/reconmand02.png"></dt>
					<dd>
						<h3>云南</h3>
						<p>这是一个很美的地方</p>
						<p>这是一个很美的地方</p>
					</dd>
				</dl>
			</div>
			<div class="tip">
				<header class="recomand tips_recomand"><span>旅游景点攻略</span><a href="#">更多</a></header>
				<dl>
					<dt>
						<h3>云南</h3>
						<p>这是一个很美的地方</p>
						<p>这是一个很美的地方</p>
					</dt>
					<dd>
						<img src="../image/reconmand01.png">
					</dd>
				</dl>
				<ul>
					<li><a href="#">胡大大</a>上传了关于<a href="#">云南</a>的攻略</li>
					<li><a href="#">胡大大</a>上传了关于<a href="#">云南</a>的攻略</li>
					<li><a href="#">胡大大</a>上传了关于<a href="#">云南</a>的攻略</li>
					<li><a href="#">胡大大</a>上传了关于<a href="#">云南</a>的攻略</li>
					<li><a href="#">胡大大</a>上传了关于<a href="#">云南</a>的攻略</li>
					<li><a href="#">胡大大</a>上传了关于<a href="#">云南</a>的攻略</li>
					<li><a href="#">胡大大</a>上传了关于<a href="#">云南</a>的攻略</li>
					<li><a href="#">胡大大</a>上传了关于<a href="#">云南</a>的攻略</li>
				</ul>
			</div>
			<div class="shop">
				<header class="recomand tips_recomand"><span>热门商城服务</span><a href="#">更多</a></header>
				<ul>
					<li><a href="#"><img src="../image/con02.png"></a>
                        <ul class="hotel-detail">
                        	<li>
                        		<h3>金明酒店</h3>
                        		<p>金明酒店</p>
                        	</li>
                        </ul>
					</li>
					<li><a href="#"><img src="../image/con02.png"></a>
                        <ul class="hotel-detail">
                        	<li>
                        		<h3>金明酒店</h3>
                        		<p>金明酒店</p>
                        	</li>
                        </ul>
					</li>
					<li><a href="#"><img src="../image/con02.png"></a>
                        <ul class="hotel-detail">
                        	<li>
                        		<h3>金明酒店</h3>
                        		<p>金明酒店</p>
                        	</li>
                        </ul>
					</li>
					<li><a href="#"><img src="../image/con02.png"></a>
                        <ul class="hotel-detail">
                        	<li>
                        		<h3>金明酒店</h3>
                        		<p>金明酒店</p>
                        	</li>
                        </ul>
					</li>
				</ul>
			</div>
		</div>
		<div class="travel-date">
			<div class="dates">
				<nav class="dates-nav">
					<ul id="dates-nav-ul">
						<li class="date-here">热门游记</li>
						<li>最新游记</li>
						<li>精品游记</li>
					</ul>
				    <a class="write-date">写游记</a>
				</nav>
			</div>
			<div class="three-parts">
				<div class="date-intro">
					<div class="date">
						<?php
       	  	              while($dateList = mysql_fetch_array($rst)){
       	  	              	$dateItem = "select * from user where username = '$dateList[username]'";
       	  	              	$dateItemQuery = mysql_Query($dateItem);
       	  	              	$dateItemResult = mysql_fetch_array($dateItemQuery);
       	  	              	$headphoto = $dateItemResult[headimg];
       	  	            ?>
					    <div class="date-item">
							<div class="date-img"><img src="../image/con01.png"/></div>
							<div class="date-tit">
								<h2><a href="dateDetail.php?id=<?php echo $dateList[id]; ?>"><?php echo $dateList[title]; ?></a></h2>
								<?php echo($dateList[content]); ?>
								<div class="writer">
									<ul>
                                        <li><img src="../image/icon01.png"/><span><?php echo($dateList[place]); ?></span></li>
                                        <li><img src="../image/<?php echo($headphoto); ?>"/><span><?php echo($dateList[username]); ?></span></li>
                                        <li><img src="../image/icon05.png"/><span>评论(<?php echo($dateList[commitcont]); ?>+)</span></li>
                                        <li><img src="../image/icon07.png"/><span>赞(<?php echo($dateList[zancommit]); ?>)</span></li>
									</ul>
								</div>
							</div>
						</div>
						<?php
                           }
						?>
					</div>
					<div class="date">
					    <div class="date-item">
							<div class="date-img"><img src="../image/con01.png"/></div>
							<div class="date-tit">
								<h2>【枫叶季】在京都最美的时光，遇见 </h2>
								<p>夏天的时候，来过关西。到处绿油油一片，看着满心欢喜。
								<p>几个月后。
								<p>绿油油的叶子变黄变红，落了一地，露出了树枝的姿态，树干的纹路。</p>
								<p>在京都最美的时光，遇见了最美的枫景。</p>
								<p>京都的初冬原来是如此醉人的。</p>
								<p>虽然有七天时间，但也觉得走得匆忙，舍不得离开。</p>
								<div class="writer">
									<ul>
                                        <li><img src="../image/icon01.png"/><span>地点</span></li>
                                        <li><img src="../image/headimg.jpg"/><span>作者</span></li>
                                        <li><img src="../image/icon05.png"/><span>评论(999+)</span></li>
                                        <li><img src="../image/icon07.png"/><span>赞(999+)</span></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="date-item">
							<div class="date-img"><img src="../image/con01.png"/></div>
							<div class="date-tit">
								<h2>【枫叶季】在京都最美的时光，遇见 </h2>
								<p>夏天的时候，来过关西。到处绿油油一片，看着满心欢喜。
								<p>几个月后。
								<p>绿油油的叶子变黄变红，落了一地，露出了树枝的姿态，树干的纹路。</p>
								<p>在京都最美的时光，遇见了最美的枫景。</p>
								<p>京都的初冬原来是如此醉人的。</p>
								<p>虽然有七天时间，但也觉得走得匆忙，舍不得离开。</p>
							    <div class="writer">
									<ul>
                                        <li><img src="../image/icon01.png"/><span>地点</span></li>
                                        <li><img src="../image/headimg.jpg"/><span>作者</span></li>
                                        <li><img src="../image/icon05.png"/><span>评论(999+)</span></li>
                                        <li><img src="../image/icon07.png"/><span>赞(999+)</span></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="date-item">
							<div class="date-img"><img src="../image/con01.png"/></div>
							<div class="date-tit">
								<h2>【枫叶季】在京都最美的时光，遇见 </h2>
								<p>夏天的时候，来过关西。到处绿油油一片，看着满心欢喜。
								<p>几个月后。
								<p>绿油油的叶子变黄变红，落了一地，露出了树枝的姿态，树干的纹路。</p>
								<p>在京都最美的时光，遇见了最美的枫景。</p>
								<p>京都的初冬原来是如此醉人的。</p>
								<p>虽然有七天时间，但也觉得走得匆忙，舍不得离开。</p>
							    <div class="writer">
									<ul>
                                        <li><img src="../image/icon01.png"/><span>地点</span></li>
                                        <li><img src="../image/headimg.jpg"/><span>作者</span></li>
                                        <li><img src="../image/icon05.png"/><span>评论(999+)</span></li>
                                        <li><img src="../image/icon07.png"/><span>赞(999+)</span></li>
									</ul>
								</div>
							</div>
						</div>						
					</div>
					<div class="date">
					    <div class="date-item">
							<div class="date-img"><img src="../image/con01.png"/></div>
							<div class="date-tit">
								<h2>【枫叶季】在京都最美的时光，遇见 </h2>
								<p>夏天的时候，来过关西。到处绿油油一片，看着满心欢喜。
								<p>几个月后。
								<p>绿油油的叶子变黄变红，落了一地，露出了树枝的姿态，树干的纹路。</p>
								<p>在京都最美的时光，遇见了最美的枫景。</p>
								<p>京都的初冬原来是如此醉人的。</p>
								<p>虽然有七天时间，但也觉得走得匆忙，舍不得离开。</p>
								<div class="writer">
									<ul>
                                        <li><img src="../image/icon01.png"/><span>地点</span></li>
                                        <li><img src="../image/headimg.jpg"/><span>作者</span></li>
                                        <li><img src="../image/icon05.png"/><span>评论(999+)</span></li>
                                        <li><img src="../image/icon07.png"/><span>赞(999+)</span></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="date-item">
							<div class="date-img"><img src="../image/con01.png"/></div>
							<div class="date-tit">
								<h2>【枫叶季】在京都最美的时光，遇见 </h2>
								<p>夏天的时候，来过关西。到处绿油油一片，看着满心欢喜。
								<p>几个月后。
								<p>绿油油的叶子变黄变红，落了一地，露出了树枝的姿态，树干的纹路。</p>
								<p>在京都最美的时光，遇见了最美的枫景。</p>
								<p>京都的初冬原来是如此醉人的。</p>
								<p>虽然有七天时间，但也觉得走得匆忙，舍不得离开。</p>
							    <div class="writer">
									<ul>
                                        <li><img src="../image/icon01.png"/><span>地点</span></li>
                                        <li><img src="../image/headimg.jpg"/><span>作者</span></li>
                                        <li><img src="../image/icon05.png"/><span>评论(999+)</span></li>
                                        <li><img src="../image/icon07.png"/><span>赞(999+)</span></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="date-item">
							<div class="date-img"><img src="../image/con01.png"/></div>
							<div class="date-tit">
								<h2>【枫叶季】在京都最美的时光，遇见 </h2>
								<p>夏天的时候，来过关西。到处绿油油一片，看着满心欢喜。
								<p>几个月后。
								<p>绿油油的叶子变黄变红，落了一地，露出了树枝的姿态，树干的纹路。</p>
								<p>在京都最美的时光，遇见了最美的枫景。</p>
								<p>京都的初冬原来是如此醉人的。</p>
								<p>虽然有七天时间，但也觉得走得匆忙，舍不得离开。</p>
							    <div class="writer">
									<ul>
                                        <li><img src="../image/icon01.png"/><span>地点</span></li>
                                        <li><img src="../image/headimg.jpg"/><span>作者</span></li>
                                        <li><img src="../image/icon05.png"/><span>评论(999+)</span></li>
                                        <li><img src="../image/icon07.png"/><span>赞(999+)</span></li>
									</ul>
								</div>
							</div>
						</div>						
					</div>
				</div>
			</div>
			<div class="digg">
		        <?php 
                 echo $pagenav;
		         ?>
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
</body>
</html>