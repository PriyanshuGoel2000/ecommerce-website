<?php
session_start();
include "conn.php";
echo $tag=$_GET['tag'];
echo $price=$_GET['price'];
echo $img=$_GET['image'];
echo $user=$_GET['user'];
echo $qty=1;
$query="SELECT qty FROM cart where user='$user' and name='$tag'";
$result=mysqli_query($conn,$query);
$count=mysqli_num_rows($result);
$row = mysqli_fetch_array($result);

if($count>0)
{
	$qty=$row['qty']+1;
	$sql="update cart set qty='$qty' where user='$user' and name='$tag'";
	mysqli_query($conn,$sql);
	header("refresh:0; url = products.php");
}
else
{
	
$sql="INSERT into cart(image, name,qty, price,user) VALUES('$img', '$tag','$qty','$price','$user')";
mysqli_query($conn,$sql);
header("refresh:0; url = products.php");

}/*
$result1 = mysqli_query($conn, "SELECT * FROM product_detail WHERE tag=$tag ");
//$row = mysqli_fetch_array($result1);

//$id=$_GET['tag'];
echo $name=$_GET['name'];
echo $price=$_GET['price'];
//echo 
*/
?>

