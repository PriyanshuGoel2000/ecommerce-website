<?php 
	require("PHPMailerAutoload.php");
    require("class.phpmailer.php");
    require("class.smtp.php");
$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
$mail->IsSMTP(); // telling the class to use SMTP

try {
  $mail->Host = gethostbyname('smtp.gmail.com');
  $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->SMTPSecure = 'ssl';
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 465;   



// set the SMTP port for the GMAIL server
  $mail->Username   = "hipstert87@gmail.com";  // GMAIL username
  $mail->Password   = "dEIGOHNONRQ@123";            // GMAIL password
  $mail->SetFrom('hipstert87@gmail', 'GETLOAN');
  $mail->AddReplyTo('hipstert87@gmail', 'GETLOAN');
  $mail->Subject = 'GETLOAN-Registration';
 
//	$token = sha1(uniqid($username, true));
	$email="priyanshu.1822it1107@kiet.edu";
	$fname="Priyanshu";

 $mail->MsgHTML("hi, this is an auto generated mail from yourself to confirm email sending through php");
  $mail->AddAddress($email, $fname); 

  
 //$mail->AddAttachment('images/phpmailer.gif');      // attachment
  //$mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
 if( $mail->Send()){
	 echo "done";
 }
	}
				
			catch (phpmailerException $e) {
			echo $e->errorMessage(); //Pretty error messages from PHPMailer
		}	 
	
									
	
	?>