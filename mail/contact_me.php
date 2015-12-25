
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
$smtpserver = "smtp.yeah.net";                           //  SMTP
$smtpserverport = 25;                                    //  SMTP
$smtpusermail = "kou_xulei@yeah.net";                    //  SMTP 
$smtpemailto = "kou_xulei@yeah.net";                     //
$smtpuser = "kou_xulei@yeah.net";                        //  SMTP
$smtppass = "@kou19891116";                              //  SMTP
$mailsubject = "Website Contact Form:  $name";           // 
$mailbody = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";      // 
$mailtype = "HTML";                                      //(HTML/TXT)
//########################################################### 
$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass); //
$smtp->debug = false;                                                   //
$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype); 
return true;
?> 
