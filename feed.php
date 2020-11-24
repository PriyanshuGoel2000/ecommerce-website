<?php
include "conn.php";
$Fname=$_REQUEST['Fname']." ";
$Lname=$_REQUEST['Lname']." ";
$email=$_REQUEST['Email']." ";
$dob=$_REQUEST['DOB']." ";
$Phone=$_POST['Phone']." ";
$Address=$_REQUEST['Address']." ";
$City=$_REQUEST['City']." ";
$Pin=$_REQUEST['Pin']." ";
$query="select Email from user_detail where Email=".$email;
$result=mysqli_query($conn,$query);
$count=mysqli_num_rows($result);
if($count>0)
{
	echo "Already Registered";
	echo "Registered";
}
else{

$sql="INSERT into user_detail(Fname, Lname, Email, DOB, Phone, Address, Pin, City) VALUES('$Fname', '$Lname','$email','$dob','$Phone','$Address', '$Pin', '$City')";


mysqli_query($conn,$sql);
echo "Registered";
header("refresh:2; url = ecom_login.html");
}


?>



