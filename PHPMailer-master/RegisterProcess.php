<?php 

	include "../connection.php";
    require("PHPMailerAutoload.php");
    require("class.phpmailer.php");
    require("class.smtp.php");
    //form variables
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $gender = $_POST['Gender'];
    $email=$_POST['email'];
    $dob=$_POST['date'];
    $password=$_POST['pass'];
    //check duplicate username
    $duplicate_user="SELECT * FROM user_details WHERE email='$email'";// check if email already registered
	$result = $conn->query($duplicate_user);
	$row = $result->fetch_assoc();
    if ($row["email"] == $email && !empty($row["password"])) 
	{
       echo "<span style='color:#cc0000'><b>the email is already registered</b></span>";
    }
	else
	{
		if($row["email"] == $email && $row["password"] == "")
	 	{
		$sql="update user_details set gender='$gender' , dob='$dob' , password='$password', email_status='1' , account_status='active' where email='$email'"; 
		$conn->query($sql);
		//CreateToken($email,$conn);
		echo "<span style='color:#cc0000'><b>Registered successfully. Plz login through your credentials.</b></span>";
		}
		else
		{
	    $sql="INSERT INTO user_details(fname,lname,gender,dob,email,password,email_status,account_status) VALUES ('$fname', '$lname', '$gender','$dob','$email','$password','0','Inactive') "; 
		$conn->query($sql);
		$encrypted=CreateToken($email,$conn);
		SendMail($email,$fname,$encrypted);
		}
	}
	
    function CreateToken($email,$conn)
	{
		$RandomStr = sha1(uniqid(md5(microtime())));
		$tokennew = substr($RandomStr,0,15);
		$encrypted = encrypt( $tokennew );
		$sql1="SELECT user_id FROM user_details WHERE email='$email'";
		$result = $conn->query($sql1);
		while($row = $result->fetch_assoc())
			{
		$user_id= $row["user_id"]; 
				
		}
		InsertToken($tokennew,$user_id,$conn);
		return $encrypted;
	}
	function InsertToken($tokennew,$user_id,$conn)
	{
		$TokenInsert = "INSERT INTO token (token_id, user_id,status) VALUES ('$tokennew', '$user_id','Inactive')";
		$conn->query($TokenInsert );
	}
	function encrypt( $input ) 
	{
	return base64_encode( $input );										
	}
	
	
function SendMail($email,$fname,$encrypted)
{
	
$mail = new PHPMailer(true); 
$mail->IsSMTP(); 

try 
{
  $mail->Host = gethostbyname('smtp.gmail.com');
  $mail->SMTPDebug  = 0;                     
  $mail->SMTPAuth   = true;                  
  $mail->SMTPSecure = 'ssl';
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 465;   
  $mail->Username   = "getloanat@gmail.com";  
  $mail->Password   = "getloan1234";            
  $mail->SetFrom('getloanat@gmail.com', 'GETLOAN');
  $mail->AddReplyTo('getloanat@gmail.com', 'GETLOAN');
  $mail->Subject = 'GETLOAN-Registration';
  $mail->MsgHTML("Dear $fname , Thank you for registration <br> Plz. click on the given link to verify your account. http://intecons.in/financeportal/new/email_check.php?token2=$encrypted. <br> Thank You, <br><br> Team-GETLOAN");
  $mail->AddAddress($email, $fname); 
  if($mail->Send())
  {
	echo "<span style='color:#cc0000'><b>Registered successfully. Plz check your mail for verification of your account.</b></span>";	
  }
 else
 {
	 echo "Mail Was Not Working ";
 }
 }
 catch (phpmailerException $e) 
 {
	echo $e->errorMessage(); 
 }	
} 
	?>
	