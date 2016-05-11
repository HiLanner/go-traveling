<?php
  $conn = @mysqli_connect("localhost","root","") or die("连接错误");
    mysqli_select_db($conn,"travel");
    mysqli_query($conn,"set names 'utf8'");
?>
<?php ?>
