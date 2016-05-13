<?php
error_reporting(0);
include ("conn.php");
$queryString = $_POST['queryString'];
if(strlen($queryString) >0) {
    //$sql= "SELECT * FROM diary";
    $sql= "SELECT title FROM diary WHERE title LIKE '".$queryString."%' LIMIT 10";
    $query = mysqli_query($conn,$sql)or die("有错");
    while ($result = mysqli_fetch_array($query,MYSQL_BOTH)){
        $value=$result['title'];
        echo '<li onClick="fill(\''.$value.'\');">'.$value.'</li>';
    }
}
?>
<?php ?>
