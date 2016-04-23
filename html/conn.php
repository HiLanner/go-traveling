<?php
  $conn = @mysql_connect("localhost","root","") or die("连接错误");
    mysql_select_db("travel",$conn);
    mysql_query("set names 'utf8'");
?>