<?php
session_start();
include "conn.php";
echo $tag=$_GET['tag'];
echo $user=$_GET['user'];
echo $qty=$_GET['qty'];
$query="SELECT qty FROM cart where user='$user' and name='$tag'";
$result=mysqli_query($conn,$query);
$count=mysqli_num_rows($result);
$row = mysqli_fetch_array($result);

if($count>0)
{
	if($qty<2)
	echo $qty=$row['qty']+$qty;
	if($qty==0)
	{
		$sql="delete from cart where user='$user' and name='$tag'";
		mysqli_query($conn,$sql);
		header("refresh:0; url = cart1.php");
	}
	$sql="update cart set qty='$qty' where user='$user' and name='$tag'";
	mysqli_query($conn,$sql);
	header("refresh:0; url = cart1.php");
}
