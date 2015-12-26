<?php
require_once ('email.class.php');
if(empty($_POST['name'])||empty($_POST['email'])||
empty($_POST['phone'])||
empty($_POST['message'])||
!filter_var($_POST

['email'],FILTER_VALIDATE_EMAIL))

{
echo "No arguments Provided!";
return false;}

$name = $_POST['name'];

$email_address = $_POST['email'];

$phone = $_POST['phone'];

$message = $_POST['message'];


//############################################################ 
$smtpserver = "smtp.qq.com";                                //  SMTP
$smtpserverport = 25;                                       //  SMTP
$smtpusermail = "672077870@qq.com";                         //  SMTP 
$smtpemailto = "672077870@qq.com";                          //
$smtpuser = "672077870@qq.com";                             //  SMTP
$smtppass = "@kou19891116";                                 //  SMTP
$mailsubject = "Website Contact Form:  $name";              // 
$mailbody = "您收到一封新邮件从您的网站的联系方式.
\n
\n"."下面是详细信息:
\n
\nName: $name
\n
\nEmail: $email_address
\n
\nPhone: $phone
\n
\nMessage:
\n$message";
$mailtype = "TXT";                                         //(HTML/TXT)
//############################################################

$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass); //
//$smtp->debug = false;                                                   //
$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype); 
return true;
?> 
