<?php
include("../html/conn.php");
include ("upload_image.php");
error_reporting(0);
session_start();
$thisId=$_GET['id'];
$last_url = $_SERVER['HTTP_REFERER'];
$username = $_SESSION['username'];
$province = $_POST['s_province'];
$city = $_POST['s_city'];
$county = $_POST['s_county'];
$place = $province . " " . $city . " " . $county;
if(strpos($last_url,"upload_tip")){
$interst = $_POST['interst'];
$tip = $_POST['my_tip'];
//echo $place;
//echo $interst;
$tipSql = "insert into tip (username,city,interst,img,tipcontent,time) values ('$username','$place','$interst','$destination','$tip',now())";
$tipQuery = mysqli_query($conn, $tipSql);
if ($tipQuery) {
    $home_url = "../html/person.php";
    header('location:' . $home_url);
}
}
if(strpos($last_url,"upload_roadline")){
    $roadline = $_POST['roadline'];
    $roadlineSql = "insert into roadline (username,city,roadline,img,time) values ('$username','$place','$roadline','$destination',now())";
    $roadlineQuery = mysqli_query($conn,$roadlineSql);
    if ($roadlineQuery) {
        $home_url = "../html/person.php";
        header('location:'.$home_url);
    }
}
if(strpos($last_url,"askQuestion")){
    $question = $_POST['question'];
    $questionSql = "insert into question (username,question,time) values ('$username','$question',now())";
    $questionQuery = mysqli_query($conn,$questionSql);
    if ($questionQuery) {
        $home_url = "../html/person.php";
        header('location:' . $home_url);
    }
}
if(strpos($last_url,"date") && !strpos($last_url,"dateDetail")) {
    $title = $_POST['txt-title'];
    $content = $_POST['content'];
    $textSql = "insert into diary(username,title,content,time) values ('$username','$title','$content',now())";
    $textQuery = mysqli_query($conn, $textSql) or die(mysqli_error());
    if ($textQuery) {
        $home_url = "../html/person.php";
        header('location:' . $home_url);
    }
}
if (strpos($last_url,"dateDetail")) {
// 提交评论
   // echo $id;
    $commit = $_POST['commitcontent'];
    $submitSql = "insert into commit(commitcontent,username,article_id,time) values ('$commit','$username','$thisId',now())";
    $submitQuery = mysqli_query($conn, $submitSql) or die(mysqli_error());
    if (submitQuery) {
        $home_url = "../html/dateDetail.php";
        header('location:' . $last_url);
    }
}
if (strpos($last_url,"community")) {

    $answer = $_POST['answer'];
    echo $answer;
    exit();
    $answerSql = "insert into answer(questionid,username,answer,time)values('$thisId','$username','$answer',now())";
    $answerSqlQuery = mysqli_query($conn,$answerSql)or die(mysqli_error($conn));
    if($answerSqlQuery){
        echo "a";
    }else{
        echo "b";
    }

}
?>
<?php ?>
