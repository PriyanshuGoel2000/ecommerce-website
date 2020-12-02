<?php 

	include "../connection.php";

    //form variables
    $uid = $_REQUEST['uid'];
	$sql1="SELECT * FROM user_details WHERE user_id='$uid'";
				
					$result = $conn->query($sql1);
					if(mysqli_num_rows($result))
					{
				while($row = $result->fetch_assoc()) {
							
					$fname= $row["fname"]; 
					$email= $row["email"]; 
					$password=$row["password"]; 				
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
  $mail->Subject = 'GETLOAN-Loan Verification';
 
//	$token = sha1(uniqid($username, true));
	
if($row["password_flag"]==0)
{
 $mail->MsgHTML("Dear $fname, Congratulations..!! Your request submited successfully.Your account has been created. Please login to your account to see your application status. Use the following credentials.<br> <table cellspacing='10'>
							<tr><td><font color='red'>ID: </font></td>
								<td><font color='blue'>$email</td></font></tr>
								<tr><td><font color='red'>Default Password: </font></td>
								<td><font color='blue'> $password </font></td></tr>
								<tr><td>Click on the link to login:</td><td>http://www.intecons.in/financeportal/new/index.php?id=clicklogin</td></tr>
								</table>
							<br> Thank You, <br><br> Team-GETLOAN");
}
else{
	$mail->MsgHTML("Dear $fname, Congratulations..!! Your request submited successfully. Please login to your account to see your application status. Use the following credentials.<br> <table cellspacing='10'>
							<tr><td><font color='red'>ID: </font></td>
								<td><font color='blue'>$email</td></font></tr>
								<tr><td><font color='red'>Password: </font></td>
								<td><font color='blue'> $password </font></td></tr>
								<tr><td><font color='red'>Click on the link to login:</td>
								<td>http://www.intecons.in/financeportal/new/index.php?id=clicklogin</td></tr>
								</table>
							<br> Thank You, <br><br> Team-GETLOAN");
	
}
  $mail->AddAddress($email, $fname); 

  
 //$mail->AddAttachment('images/phpmailer.gif');      // attachment
  //$mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
  if($mail->Send()){
	echo "<script>alert('Your request submited. To view your application status please check your registered email.Thank You.');window.location.href='../index.php';</script>";
  }
  //echo "Message Sent OK </p>\n";
	
	}
				
			catch (phpmailerException $e) {
			echo $e->errorMessage(); //Pretty error messages from PHPMailer
		}	 
	
		}
				}	else {
						echo "error";
						die();
					}						
	
 

$conn->close();

	
	?>