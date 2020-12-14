<?php
include "conn.php";
?>
<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Designing Store</title>
  <meta name="author" content="Jake Rocheleau">
  <link rel="shortcut icon" href="http://spyrestudios.com/favicon.ico">
  <link rel="icon" href="http://spyrestudios.com/favicon.ico">
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
</head>

<body>
  <div id="w">
    <header id="title">
      <h1>Designing Store Shopping Cart</h1>
    </header>
    <div id="page">
      <table id="cart">
        <thead>
          <tr>
            <th class="first">Photo</th>
            <th class="second">Qty</th>
            <th class="third">Product</th>
            <th class="fourth">Line Total</th>
            <th class="fifth">&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          <!-- shopping cart contents -->
		  
		  <?php
		  $total=0;
		  $query="SELECT COUNT(*) FROM cart";
		  $result=mysqli_query($conn,$query);
		  $count=mysqli_num_rows($result);
		  for ($x = 1; $x <= $count ; $x++){
		  $img="SELECT image FROM cart WHERE serial='$x'";
		  $resimage = mysqli_query($conn, $img);
          $res_img = $resimage->fetch_array()[0] ?? '';
		  $name="SELECT name FROM cart WHERE serial='$x'";
		  $resname = mysqli_query($conn, $name);
          $res_name = $resimage->fetch_array()[0] ?? '';
		  
		  $price="SELECT price FROM cart WHERE serial='$x'";
		  $resprice = mysqli_query($conn, $price);
          $res_price = $resimage->fetch_array()[0] ?? '';
		  
		  ?>
          <tr class="productitm">
            <!-- http://www.inkydeals.com/deal/ginormous-bundle/ -->
            <td><?php echo "$res_img" ?></td>
            <td><input type="number" name="qty" value="1" min="0" max="99" class="qtyinput"></td>
            <td><?php echo $res_name ?></td>
            <td><?php echo "Rs.$res_price" ?></td>
            <td><span class="remove"><img src="images/trash.png" alt="X"></span></td>
          </tr>
		  <?php
		  
		  }
		  ?>
          
          
          <!-- tax + subtotal -->
          <tr class="extracosts">
            <td class="light">Shipping &amp; Tax</td>
            <td colspan="2" class="light"></td>
            <td>0.0</td>
            <td>&nbsp;</td>
          </tr>
          <tr class="totalprice">
            <td class="light">Total:</td>
            <td colspan="2">&nbsp;</td>
            <td colspan="2"><span class="thick"><?php echo "Rs. $total" ?></span></td>
          </tr>
          
          <!-- checkout btn -->
          <tr class="checkoutrow">
            <td colspan="5" class="checkout"><button class="btn btn-primary" type="submit"><a href="TxnTest.php" target="_blank">Checkout Now</a></button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>