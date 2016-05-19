<?php
function postmail($to,$subject='',$body='')
{
header("content-type:text/html;charset=utf-8");
 error_reporting(E_STRICT);
    date_default_timezone_set('Asia/Shanghai');//设定时区东八区
    require_once('class.phpmailer.php');
    include('class.smtp.php');
try {
	$mail = new PHPMailer(true); 
	$mail->IsSMTP();
	$mail->CharSet='UTF-8'; //设置邮件的字符编码，这很重要，不然中文乱码
	$mail->SMTPAuth   = true;                  //开启认证
	$mail->Port       = 25;                    
	$mail->Host       = "smtp.163.com"; 
	$mail->Username   = "15736882937@163.com";    
	$mail->Password   = "symjyh520";            
	//$mail->IsSendmail(); //如果没有sendmail组件就注释掉，否则出现“Could  not execute: /var/qmail/bin/sendmail ”的错误提示
	$mail->AddReplyTo("15736882937@163.com","mckee");//回复地址
	$mail->From       = "15736882937@163.com";
	$mail->FromName   = "管理员";
	$mail->AddAddress($to);
	$mail->Subject  = $subject;
    $mail->AltBody    = 'To view the message, please use an HTML compatible email viewer!'; // optional, comment out and test
    $mail->MsgHTML($body);
    $address = $to;
	$mail->WordWrap   = 80; // 设置每行字符串的长度
	//$mail->AddAttachment("f:/test.png");  //可以添加附件
	$mail->IsHTML(true); 
	$mail->Send();
    echo "<script>alert('邮件已经发送，请注意查收');history(-1);</script>";
} catch (phpmailerException $e) {
	echo "<script>alert('邮件发送失败:');</script>";
}
}
?>