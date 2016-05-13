<?php
error_reporting(0);
session_start();
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
            <span class="user-info"><?php echo $_SESSION['url']; ?>|<a href="person.php"><?php echo $_SESSION['username']; ?></a></span>
            <?php
        }
        ?>
    </div>
</header>
<div class="img-show bgImg">
    <img src="../image/info01.jpeg"/>
</div>
<div class="container self-center">
    <form class="merchantUpload" action="merchantUpload.php" name="myform" method="post" enctype="multipart/form-data">
        <div class="self-basic-top">
            <p><i class="fa fa-map"><?php echo $_SESSION['username']; ?></i>&nbsp;&nbsp;<b>Lv20</b></p>
        </div>
        <p><label>姓名：</label><b><?php echo $_SESSION['username']; ?></b></p>
        <p><label class="input_name">类别：</label><select name="select">
                <option value="hotel">酒店</option>
                <option value="car">租车</option>
                <option value="specialty">特产</option>
            </select><span class="change-tips">请选择商品类别</span></p>
        <p><label class="input_name">实物图：</label><input type="file" name="file" /><span class="change-tips">请上传实物图</span></p>
        <p><label class="input_name">描述：</label><textarea cols="50" rows="10" name="description"></textarea><span class="change-tips">请输入描述</span></p>
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