<?php
session_start();
include "conn.php";
$_SESSION["Email"];
if(!isset($_SESSION["Email"]))
{
header("refresh:0; url = login.html");
}
$user=$_SESSION["Email"];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cart | Life Style Store</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

        <!--jQuery library--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <!--Latest compiled and minified JavaScript--> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="./css/index.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="products.php">Designing Store</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="cart.html"><span class="glyphicon glyphicon-shopping-cart"></span> Cart </a></li>
                        <li><a href="settings.html"><span class="glyphicon glyphicon-user"></span> Settings </a></li>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout </a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid content table-responsive">
            <div class="row decor_bg">
                <div class="col-md-6 col-md-offset-3">
                    <table class="table table-hover table-striped">
                            <tbody>
                                <tr>
								<th>Item </th>
                                    <th>Item Qty.</th>
                                    <th>Item Name</th>
                                    <th>Price</th>
                                    <th></th>
                                </tr>
								<?php
								  $total=0;
								  $query="SELECT * FROM cart where user='$user'";
								  $result=mysqli_query($conn,$query);
								  $count=mysqli_num_rows($result);
								  while ($row = mysqli_fetch_array($result)) {
									//  $img="SELECT image FROM cart WHERE serial='$x'";
								  //$resimage = $row['image'];
								  $res_img = $row['image'];//$resimage->fetch_array()[0] ?? '';
								  //$name="SELECT name FROM cart WHERE serial='$x'";
								  //$resname = mysqli_query($conn, $name);
								  $res_name =$row['name']; //$resimage->fetch_array()[0] ?? '';
								   $res_qty=$row['qty'];
								  //$price="SELECT price FROM cart WHERE serial='$x'";
								  //$resprice = mysqli_query($conn, $price);
								  $res_price = $row['price'];//$resimage->fetch_array()[0] ?? '';
								  //$total=$total+$res_price;
										 echo "<tr class='productitm'>";
									 //<!-- http://www.inkydeals.com/deal/ginormous-bundle/ -->
									 echo " <td> $res_img</td>";
									 echo "<td><input type='number' id='qty' name='qty' value='$res_qty' min='1' max='99' class='qtyinput' ></td>";
									 echo "<td>$res_name </td>";
									 echo "<td>Rs.$res_price</td>";
									 echo "<td><span class='remove'><a href='delete_cart.php?name=".$res_name."'><img src='images/trash.png' alt='X'></a></span></td>";
								  echo " </tr>";
								  //echo $qty=(int)("document.getElementById('qty').value")+1;
										 $total=$total+$res_price;
										}
										?>
                                <tr>
                                    <th></th>
                                    <th>Total</th>
                                    <th>Rs.<?php echo $total?></th>
                                    <th><button class="btn btn-primary" type="submit"><a href="TxnTest.php?amt=<?php echo $total?>&user=<?php echo $_SESSION["Email"];?>" target="_blank">Confirm Order</a></button></th>
                                </tr>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
       <footer>
            <div class="container">
                <center>
                 <p>Copyright 	&#169; Designing Store. All Rights
                Reserved | Contact Us: +91 90000 00000. </p>
                </center>	
            </div>    
        </footer>
    </body>
</html>