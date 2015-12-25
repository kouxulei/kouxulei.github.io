
<?php  
require_once ('email.class.php'); 

if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }

$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

//######################################################### 
$smtpserver = "smtp.yeah.net";                           //  SMTP服务器 
$smtpserverport =25;                                     //  SMTP服务器端口 
$smtpusermail = "kou_xulei@yeah.net";                    //  SMTP服务器的用户邮箱 
$smtpemailto = "xulei.kou@icloud.com";                   //  发送给谁  收件人
$smtpuser = "kou_xulei@yeah.net";                        //  SMTP服务器的用户帐号 
$smtppass = "@kou19891116";                              //  SMTP服务器的用户密码 
$mailsubject = "Website Contact Form:  $name";           //  邮件主题 
$mailbody = "<h1> "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message"; </h1>";          //  邮件内容 
$mailtype = "TXT";                                      //  邮件格式（HTML/TXT）,TXT为文本邮件 
########################################################### 

$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);   //这里面的一个true是表示使用身份验证,否则不使用身份验证. 
$smtp->debug = true;//是否显示发送的调试信息 

$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype); 
return true;
?> 
