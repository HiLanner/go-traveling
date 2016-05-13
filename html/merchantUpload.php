<?php
include("conn.php");
session_start();
$username = $_SESSION['username'];
//echo $username;
error_reporting(0);
//上传文件类型列表
$file = $_FILES['file'];
$name = $file['name'];
$uptypes=array(
    'image/jpg',
    'image/jpeg',
    'image/png',
    'image/pjpeg',
    'image/gif',
    'image/bmp',
    'image/x-png'
);
$max_file_size=2000000;	 //上传文件大小限制, 单位BYTE
$destination_folder="../merchant/"; //上传文件路径
$cun="../merchant/";
$imgpreview=1;	  //是否生成预览图(1为生成,其他为不生成);
$imgpreviewsize=1/2;	//缩略图比例
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (is_uploaded_file($_FILES["file"][tmp_name])) {
        //是否存在文件
        //{
        //  echo "图片不存在!";
        //exit;
        //}

        $file = $_FILES["file"];
        if ($max_file_size < $file["size"]) //检查文件大小
        {
            echo "文件太大!";
            exit;
        }

        if (!in_array($file["type"], $uptypes)) //检查文件类型
        {
            echo "文件类型不符!" . $file["type"];
            exit;
        }

        if (!file_exists($destination_folder)) {
            mkdir($destination_folder);
        }
        $filename = $file["tmp_name"];
        $image_size = getimagesize($filename);
        $pinfo = pathinfo($file["name"]);
        $ftype = $pinfo['extension'];
        $destination = $destination_folder . time() . "." . $ftype;
        if (file_exists($destination) && $overwrite != true) {
            echo "同名文件已经存在了";
            exit;
        }

        if (!move_uploaded_file($filename, $destination)) {
            echo "移动文件出错";
            exit;
        }

        if ($imgpreview == 1) {
            echo "<br>图片预览:<br>";
            echo "<img src=\"" . $destination . "\" width=" . ($image_size[0] * $imgpreviewsize) . " height=" . ($image_size[1] * $imgpreviewsize);
            echo " alt=\"图片预览:\r文件名:" . $destination . "\r上传时间:\">";
        }
    }
    $select = $_POST[select];
    $describtion = $_POST[description];
    // $email = $_POST[email];
    //$password = md5($_POST[pwd]);
    $sql = "insert into merchant (username,sorts,describtion,img,uploadtime) VALUES ('$username','$select','$describtion','$destination',now())";
    $sqlQuery = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if($sqlQuery){
        $home_url = "shop.php";
        //echo $_SESSION['username'];
        // exit();
        header('location:'.$home_url);
    }
}

?>
<?php ?>
