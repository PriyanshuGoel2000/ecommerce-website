<?php
include "conn.php";
$tag=$_REQUEST['tag']." ";
echo $tag;
$result1 = mysqli_query($conn, "SELECT * FROM product_detail WHERE tag=$tag ");
$row = mysqli_fetch_array($result1);
$img=$row['image'];
$id=$row['tag'];
$name=$row['name'];
$price=$row['tag'];
echo $sql="INSERT into cart(image, id, name, price) VALUES('$img', '$id','$name','$price')";
mysqli_query($conn,$sql);

?>

