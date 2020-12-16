<?php
<<<<<<< HEAD
session_start();
include "conn.php";
echo $tag=$_GET['tag'];
echo $price=$_GET['price'];
echo $img=$_GET['image'];
$sql="INSERT into cart(image, name, price) VALUES('$img', '$tag','$price')";
mysqli_query($conn,$sql);
header("refresh:0; url = products.php");
/*
$result1 = mysqli_query($conn, "SELECT * FROM product_detail WHERE tag=$tag ");
//$row = mysqli_fetch_array($result1);

//$id=$_GET['tag'];
echo $name=$_GET['name'];
echo $price=$_GET['price'];
//echo 
*/


