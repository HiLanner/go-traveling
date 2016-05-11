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
    $dateSqlQuery = mysqli_query($conn,$date) or die(mysqli_error());
    $roadlineSqlQuery = mysqli_query($conn,$roadline) or die(mysqli_error());
    $tipSqlQuery = mysqli_query($conn,$tip) or die(mysqli_error());
    $questionSqlQuery = mysqli_query($conn,$question) or die(mysqli_error());
    $dateList = mysqli_fetch_array($dateSqlQuery);
    $roadlineList = mysqli_fetch_array($roadlineSqlQuery);
    $tipList = mysqli_fetch_array($tipSqlQuery);
    $questionList = mysqli_fetch_array($questionSqlQuery);

  
    
    $page = $_GET["page"];
    $page_size = 4;
    $rows = mysqli_num_rows($dateSqlQuery);
    //echo $rows;
    Page($rows,$page_size);
	$sql = "select * from diary limit $select_from $select_limit";
    $rst = mysqli_query($conn,$sql) or die(mysqli_error());

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
			<form id="form1" name="form1" method="post" action="">
			    <input name="keyword" id="keyword" type="text" />&nbsp;&nbsp;<input name="search" type="button" value="搜索" />
			</form>
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
       	  	              while($dateList = mysqli_fetch_array($rst)){
       	  	              	$dateItem = "select * from user where username = '$dateList[username]'";
       	  	              	$dateItemQuery = mysqli_Query($conn,$dateItem);
       	  	              	$dateItemResult = mysqli_fetch_array($dateItemQuery);
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
	<script type="text/javascript" src="../js/jQuery.js"></script>
	<script type="text/javascript" src="../js/tab.js"></script>
	<script type="text/javascript" src="../js/style.js"></script>
	<script type="text/javascript" src="../js/prototype.js"></script>
	<script type="text/javascript">
		var lastindex=-1;
		var flag=false;
		var listlength=0;
		function StringBuffer(){this.data=[];}
		StringBuffer.prototype.append=function(){this.data.push(arguments[0]);return this;}
		StringBuffer.prototype.tostring=function(){return this.data.join("");}
		String.prototype.Trim = function(){return this.replace(/(^\s*)|(\s*$)/g, "");}
		function hiddensearch()
		{
			$('rlist').style.display="none";
			$('rFrame').style.display="none";
		}
		function showsearch(num)
		{
			$('rlist').style.display='';
			$('rFrame').style.display='';
			$('rlist').style.height=num*20+num+'px';
			$('rFrame').style.height=num*20+num+'px';
		}
		function getposition(element,offset)
		{
			var c=0;
			while(element)
			{
				c+=element[offset];
				element=element.offsetParent
			}
			return c;
		}
		function createlist()
		{
			var listDiv=document.createElement("div");
			listDiv.id="rlist";
			listDiv.style.zIndex="2";
			listDiv.style.position="absolute";
			listDiv.style.border="solid 1px #000000";
			listDiv.style.backgroundColor="#FFFFFF";
			listDiv.style.display="none";
			listDiv.style.width=$('keyword').clientWidth+"px";
			listDiv.style.left=getposition($('keyword'),'offsetLeft')+1.5+"px";
			listDiv.style.top =(getposition($('keyword'),'offsetTop')+$('keyword').clientHeight +3)+"px";

			var listFrame=document.createElement("iframe");
			listFrame.id="rFrame";
			listFrame.style.zIndex="1";
			listFrame.style.position="absolute";
			listFrame.style.border="0";
			listFrame.style.display="none";
			listFrame.style.width=$('keyword').clientWidth+"px";
			listFrame.style.left=getposition($('keyword'),'offsetLeft')+1+"px";
			listFrame.style.top =(getposition($('keyword'),'offsetTop')+$('keyword').clientHeight +3)+"px";
			document.body.appendChild(listDiv);
			document.body.appendChild(listFrame);
		}
		function setstyle(element,classname)
		{
			switch (classname)
			{
				case 'm':
					element.style.fontSize="12px";
					element.style.fontFamily="arial,sans-serif";
					element.style.backgroundColor="#3366cc";
					element.style.color="black";
					element.style.width=$('keyword').clientWidth-2+"px";
					element.style.height="20px";
					element.style.padding="1px 0px 0px 2px";
					if(element.displaySpan)element.displaySpan.style.color="white"
					break;
				case 'd':
					element.style.fontSize="12px";
					element.style.fontFamily="arial,sans-serif";
					element.style.backgroundColor="white";
					element.style.color="black";
					element.style.width=$('keyword').clientWidth-2+"px";
					element.style.height="20px";
					element.style.padding="1px 0px 0px 2px";
					if(element.displaySpan)element.displaySpan.style.color="green"
					break;
				case 't':
					element.style.width="80%";
					if(window.navigator.userAgent.toLowerCase().indexOf("firefox")!=-1)element.style.cssFloat="left";
					else element.style.styleFloat="left";
					element.style.whiteSpace="nowrap";
					element.style.overflow="hidden";
					element.style.textOverflow="ellipsis";
					element.style.fontSize="12px";
					element.style.textAlign="left";
					break;
				case 'h':
					element.style.width="20%";
					if(window.navigator.userAgent.toLowerCase().indexOf("firefox")!=-1)element.style.cssFloat="right";
					else element.style.styleFloat="right";
					element.style.textAlign="right";
					element.style.color="green";
					break;
			}
		}
		function focusitem(index)
		{
			if($('item'+lastindex)!=null)setstyle($('item'+lastindex),'d');
			if($('item'+index)!=null)
			{
				setstyle($('item'+index), 'm');
				lastindex=index;
			}
			else $("keyword").focus();
		}
		function searchclick(index)
		{
			$("keyword").value=$('title'+index).innerHTML;
			flag=true;
		}
		function searchkeydown(e)
		{
			if($('rlist').innerHTML=='')return;
			var keycode=(window.navigator.appName=="Microsoft Internet Explorer")?event.keyCode:e.which;
			//down
			if(keycode==40)
			{
				if(lastindex==-1||lastindex==listlength-1)
				{
					focusitem(0);
					searchclick(0);
				}
				else{
					focusitem(lastindex+1);
					searchclick(lastindex+1);
				}
			}
			if(keycode==38)
			{
				if(lastindex==-1)
				{
					focusitem(0);
					searchclick(0);
				}
				else{
					focusitem(lastindex-1);
					searchclick(lastindex-1);
				}
			}
			if(keycode==13)
			{
				focusitem(lastindex);
				$("keyword").value=$('title'+lastindex).innerText;
			}
			if(keycode==46||keycode==8){flag=false;ajaxsearch($F('keyword').substring(0,$F('keyword').length-1).Trim());}
		}
		function showresult(xmlhttp)
		{
			var result=unescape(xmlhttp.responseText);
			if(result!=''){
				var resultstring=new StringBuffer();
				var title=result.split('$')[0];
				var hits=result.split('$')[1];
				for(var i=0;i<title.split('|').length;i++)
				{
					resultstring.append('<div id="item'+i+'" onmousemove="focusitem('+i+')" onmousedown="searchclick('+i+')">');
					resultstring.append('<span id=title'+i+'>');
					resultstring.append(title.split('|')[i]);
					resultstring.append('</span>');
					resultstring.append('<span id=hits'+i+'>');
					resultstring.append(hits.split('|')[i]);
					resultstring.append('</span>');
					resultstring.append('</div>');
				}
				$('rlist').innerHTML=resultstring.tostring();
				for(var j=0;j<title.split('|').length;j++)
				{
					setstyle($('item'+j),'d');
					$('item'+j).displaySpan=$('hits'+j);
					setstyle($('title'+j),'t');
					setstyle($('hits'+j),'h');
				}
				showsearch(title.split('|').length);
				listlength=title.split('|').length;
				lastindex=-1;
			}
			else hiddensearch();
		}
		function ajaxsearch(value)
		{
			new Ajax.Request('search.php',{method:"get",parameters:"action=do&keyword="+escape(value),onComplete:showresult});
		}
		function main()
		{
			$('keyword').className=$('keyword').className=='inputblue'?'inputfocus':'inputblue';
			if($F('keyword').Trim()=='')hiddensearch();
			else
			{
				if($F('keyword')!=''&&flag==false)ajaxsearch($F('keyword').Trim());
				if(listlength!=0)$('keyword').onkeydown=searchkeydown;
				else hiddensearch();
			}
		}
		function oninit()
		{
			$('keyword').autocomplete="off";
			$('keyword').onfocus=main;
			$('keyword').onkeyup=main;
			$('keyword').onblur=hiddensearch;
			createlist();
		}
		Event.observe(window,'load',oninit);
	</script>
</body>
</html>