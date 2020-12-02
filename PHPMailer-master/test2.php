<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php
include "../connection.php";
$email = $_GET['q'];

//echo $email;
$sql1="SELECT password, fname FROM user_details WHERE email='$email'";
				if (true) {
					$result = $conn->query($sql1);
				while($row = $result->fetch_assoc()) {
					$password= $row["password"]; 
					$fname= $row["fname"]; 
					
													
	require("PHPMailerAutoload.php");
    require("class.phpmailer.php");
    require("class.smtp.php");
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
  $mail->SetFrom('getloanat@gmail.com', 'GETLOAN');
  $mail->AddReplyTo('getloanat@gmail.com', 'GETLOAN');
  $mail->Subject = 'GETLOAN-Registration';
 
//	$token = sha1(uniqid($username, true));
	

 $mail->MsgHTML("Dear $fname, your password is : <b> $password </b><br> Thank You, <br><br> Team-GETLOAN");
  $mail->AddAddress($email, $fname); 

  
 //$mail->AddAttachment('images/phpmailer.gif');      // attachment
  //$mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
  if($mail->Send()){
	echo "Your password is sent to your registered mail account. Thank you";
  }
  //echo "Message Sent OK </p>\n";
	
	}
				
			catch (phpmailerException $e) {
			echo $e->errorMessage(); //Pretty error messages from PHPMailer
		}	 
	
		}
				}	else {
						echo "Email is not registered.";
						
					}						
	
 

$conn->close();

				

?>
</body>
</html>