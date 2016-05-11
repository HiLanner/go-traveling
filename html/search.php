<?php
error_reporting(0);
if($_GET["action"]!=''){
    $keyword=$_GET["keyword"];
    $keyword=str_replace("[","[[]",$keyword);
    $keyword=str_replace("&","[&]",$keyword);
    $keyword=str_replace("%","[%]",$keyword);
    $keyword=str_replace("^","[^]",$keyword);
    $sql="select title,zancommit from diary where title like '%".$keyword."%' order by zancommit desc limit 10";
    $result=mysql_query($sql);
    if($result){
        $i=1;$title='';$zancommit='';
        while($row=mysql_fetch_array($result,MYSQLI_BOTH))
        {
            $title=$title.$row['title'];
            $zancommit=$zancommit.$row['zancommit'];
            if($i<mysql_num_rows($result))
            {
                $title=$title."|";
                $zancommit=$zancommit."|";
            }
            $i++;
        }
    }
    mysql_close();
}
?>
<?php echo $title.'$'.$zancommit;?>
