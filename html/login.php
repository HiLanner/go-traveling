<?php
    session_start();
    include("conn.php"); 
//    error_reporting(0);

     if(isset($_POST["submit"])){
      $email = $_POST[email];
      $password = md5($_POST[pwd]);
      $userSql = "select password,username from user where email ='$email'";
  
      $userQuery = mysqli_query($conn,$userSql);

      $userRow = mysqli_fetch_array($userQuery);
      //var_dump($userRow);
      //exit();
      if (!$userRow) {
          ?>
            <div id="error">
                <p>登陆失败，请检查账号密码</p>
            </div>
        <?php
      }else{
          if ($userRow[0]!= $password) {
              ?>
                <div id="error">
                    <p>登陆失败，请检查账号密码</p>
                </div>
            <?php
          }else{
            ?>
                <div id="error">
                    <p>登陆成功！</p>
                </div>
            <?php
            $_SESSION['username']=$userRow[1];
            $home_url = "person.php";
            //echo $_SESSION['username'];
           // exit();
            header('location:'.$home_url);
          }
      }
}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<title>一起去旅行</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<style type="text/css">
       body{
       	background: url("../image/city05.jpeg") fixed no-repeat;
       	background-size: 100%;
       }
	</style>
</head>
<body>
	<header class="header login-header">
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
		</div>
	</header>
	<div class="container tologin">
        <div class="user-table login-table">
            <form action="login.php" name="myform" method="post" onsubmit="return checkPost()">
                 <p><span class="input_name login_name">手机/邮箱</span><input type="text" name="email"><span class="tips">输入有效的手机号或电子邮件</span></p>
                <p><span class="input_name login_name">密&emsp;&emsp;码</span><input type="password" name="pwd"><span class="tips">密码由6-16位有效的数字,字母标点符号下划线组成</span>
                <p><span class="input_name"></span><input type="submit" name="submit" value="登陆"><b class="to_register">&nbsp;&nbsp;没有账号?去<a href="register.php">注册</a></b></p> <!---->
            </form>
        </div>
	</div>	
	<script type="text/javascript" src="../js/jQuery.js"></script>
	<script type="text/javascript" src="../js/login.js"></script>
</body>
</html>