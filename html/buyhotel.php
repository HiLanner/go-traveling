<?php
include("conn.php");
$h_id=$_GET['h_id'];
$sqlHotel = "select * from merchant where id = '$h_id'";
$sqlHotelQuery = mysqli_query($conn,$sqlHotel) or die(mysqli_errno());
$sqlHotelResult = mysqli_fetch_array($sqlHotelQuery);
$name= $sqlHotelResult['username'];
$sorts=$sqlHotelResult['sorts'];
$d_time=time();
include("test.php");
postmail('1280373231@qq.com','系统消息','用户名为：qwe的用户在'.$d_time.'订购了商家：'.$name.'的'.$sorts.'这个商品');
?>
<?php ?>
