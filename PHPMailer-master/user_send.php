<?php 
include "../connection.php";
require("PHPMailerAutoload.php");
    require("class.phpmailer.php");
    require("class.smtp.php");
//ob_start();
$fname=$_REQUEST["fname"];
//$lname=$_POST["lname"];
$email=$_REQUEST["email"];
$message=$_REQUEST["message"];
$topic= $_REQUEST["topic"];
$phone=$_REQUEST["phoneno"];


$RandomStr = sha1(uniqid(md5(microtime())));
$appid = substr($RandomStr,0,5);

$sql="INSERT INTO user_complain(user_app_id,name,email,phone,topic,message) VALUES ('$appid', '$fname', '$email','$phone','$topic','$message') "; 
$conn->query($sql);
$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
$mail->IsSMTP(); // telling the class to use SMTP

try {
  $mail->Host = gethostbyname('smtp.gmail.com');
  $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->SMTPSecure = 'ssl';
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 465;   



// set the SMTP port for the GMAIL server
  $mail->Username   = "getloanat@gmail.com";  // GMAIL username
  $mail->Password   = "getloan1234";            // GMAIL password
  $mail->SetFrom($email, 'Contact Info');
  $mail->AddReplyTo($email, 'contact info');
  $mail->Subject = 'USER-CONTACT';
  $mail->MsgHTML("<body><table border='5' cellspacing='10'>
							<tr><td><font color='red'>User Name: </font></td>
								<td><font color='blue'>$fname</td></font></tr>
								<tr><td><font color='red'>Application ID: </font></td>
								<td><font color='red'> $appid </font></td></tr>
							<tr><td><font color='red'>User complain regarding :</font></td>
								<td><font color='blue'> $topic </font></td></tr>
							<tr><td><font color='red'>user mail id:</font></td>
							<td><font color='blue'> $email</font></td></tr>
							<tr><td><font color='red'>Phone:</font></td>
							<td><font color='blue'> $phone</font></td></tr>
							<tr><td><font color='red'>Message:</font></td>
							<td><font color='blue'> $message</font></td></tr>");
  $mail->AddAddress('getloanat@gmail.com', 'GETLOAN'); 

  
 //$mail->AddAttachment('images/phpmailer.gif');      // attachment
  //$mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
 if($mail->Send()){
	header('location:../waytosms/example1.php?fname='.$_REQUEST['fname'].'&phone='.$_REQUEST['phoneno'].'&appid='.$appid.'');
  }
  //echo "Message Sent OK </p>\n";
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} /*catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
} echo "<h1>Your registration is completed. Plz check your mail for confirmation of your account.</h1>";
	//header('Refresh: 3;url=http://www.intecons.in/financeportal/EmailSender.php');*/
	//header('location:../login.php');
?>