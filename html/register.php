<?php
    include("conn.php");
    error_reporting(0);
    if(isset($_POST["submit"])){
      $user = $_POST[user_name];
      $userSql = "select username from `user`";
      $userQuery = mysql_query($userSql);
      $userRow = mysql_fetch_array($userQuery);
      while($userRow = mysql_fetch_array($userQuery)){
        if ($userRow[username] == $user) {
          # code...
          ?>
          <div id="error">
            <p>该用户名已存在,请重新输入！</p>
          </div>
          <?php
          break;
        }else{
           $pwd = md5($_POST[pwd]);
      $sql = "insert into user (username,phonenum,email,password,logintime) values ('$_POST[user_name]','$_POST[email]','$_POST[email]','$pwd',now())";
      mysql_query($sql);
        }
      }
     
      mysql_close();
    }else{
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
       	background: url("../image/city06.jpeg") fixed no-repeat;
       	background-size: 100%;
       }
	</style>
</head>
<body>
  <header class="header register-header">
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
    </div>
  </header>
	<div class="container toregister">
        <div class="user-table reg_table">
            <!-- <p>用户注册</p> -->
            <form action="register.php" name="myform" method="post" onsubmit="return checkPost()">
                <p><span class="input_name reg_name">昵&emsp;&emsp;称</span><input type="text" name="user_name"><span class="tips">6-20位由汉字,字母,下划线组成</span></p>
                <p><span class="input_name reg_name">手机/邮箱</span><input type="text" name="email"><span class="tips">输入有效的手机号或电子邮件</span></p>
                <p><span class="input_name reg_name">密&emsp;&emsp;码</span><input type="password" name="pwd"><span class="tips">密码由6-16位有效的数字,字母标点符号下划线组成</span></p>
                <p><span class="input_name reg_name">确认密码</span><input type="password" name="dbpwd"><span class="tips">请再次输入密码</span></p>
                <p><span class="input_name reg_name"></span><input type="checkbox"><b class="checkbox_tip">我已阅读并同意<a href="">相关协议</a></b></p>
                <p><span class="input_name reg_name"></span><input type="submit" name="submit" value="立即注册">&nbsp;&nbsp;<b class="to_login">已有账号?去<a href="login.php">登录</a></b></p>
            </form>
        </div>
	</div>  
  <script type="text/javascript" src="../js/jQuery.js"></script>
  <script type="text/javascript" src="../js/login.js"></script>
  <!-- Default Value: E_ALL & ~E_NOTICE
;   Development Value: E_ALL | ~E_STRICT
;   Production Value: E_ALL & ~E_DEPRECATED -->
</body>
</html>