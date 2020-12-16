<?php
session_start();
include "conn.php";
$_SESSION["Email"];
echo $name=$_GET['name'];
echo $user=$_SESSION["Email"];

$sql="DELETE FROM cart WHERE name='$name' and user='$user'";
mysqli_query($conn,$sql);
header("refresh:0; url = cart1.php");
/*
$result1 = mysqli_query($conn, "SELECT * FROM product_detail WHERE tag=$tag ");
//$row = mysqli_fetch_array($result1);

//$id=$_GET['tag'];
echo $name=$_GET['name'];
echo $price=$_GET['price'];
//echo 
*/
?>