<?php
session_start();
include "conn.php";
?>
<html>
<head>
</head>
<body>
<?php
$email=$_POST['email'];
$pass=$_POST['password'];
$query="select * from user_detail where Email='$email' and Pass='$pass'";
$result=mysqli_query($conn,$query);
$count=mysqli_num_rows($result);
if($count>0){
$_SESSION["Email"]=$email;
?>
<script>
window.location='products.php';
</script>
<?php	
}
else {
?>
<script>
alert('Email or password invalid');
window.location='login.html';
</script>	
	
	
<?php
}
?>
</body>
</html>