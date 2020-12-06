<?php
session_start();
include "conn.php";
echo $old=$_POST['oldpassword'];
echo $new=$_POST['newpassword'];
echo $email=$_SESSION["Email"];
$query="select * from user_detail where Pass='$old' and Email='$email'";
$result=mysqli_query($conn,$query);
$count=mysqli_num_rows($result);
if($count>0){
	echo $change_query="update user_detail set Pass = '$new' where Email='$email'";
	$result1=mysqli_query($conn,$change_query);
	if($result1)
	{
		
?>
<script>
alert('Password Changed Successfully.');
window.location='products.php';
</script>
<?php	
}
}
else {
?>
<script>
alert('Old Password Invalid');
window.location='settings.html';
</script>	
	
	
<?php

}
?>