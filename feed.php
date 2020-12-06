<?php
include "conn.php";
$Fname=$_REQUEST['Fname']." ";
$Lname=$_REQUEST['Lname']." ";
$email=$_REQUEST['Email']." ";
$pass=$_REQUEST['Pass'];
$dob=$_REQUEST['DOB']." ";
$Phone=$_POST['Phone']." ";
$Address=$_REQUEST['Address']." ";
$City=$_REQUEST['City']." ";
$Pin=$_REQUEST['Pin']." ";
$query="select Email from user_detail where Email='$email'";
$result=mysqli_query($conn,$query);
$count=mysqli_num_rows($result);
if($count>0)
{
	echo "<br>";
	?>
	<script>
	alert("Already Registered");
	</script>
	<?php
	header("refresh:2; url = login.html");
}
	
else{

echo $sql="INSERT into user_detail(FName, LName, Email, Pass, DOB, Phone, Address, City, Pin) VALUES('$Fname', '$Lname','$email','$pass','$dob','$Phone','$Address', '$City','$Pin')";


mysqli_query($conn,$sql);
echo "<br>";
?>
<script>
	alert("Registered Successfully");
</script>
<?php
header("refresh:3; url = login.html");
}
/*
$query = "select Email from user_detail where Email='$email'";
$result=mysqli_query($conn,$query);
$count=mysqli_num_rows($result);
if($count>0){
	  ?>
 <script>
 alert("you are already registered");
 echo "Already Registered";
 window.location="razor.php";
 </script>
 <?php }

*/



?>

