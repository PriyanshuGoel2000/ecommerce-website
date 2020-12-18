<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;


$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.



echo"<br>";
?>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Products | Designing Store</title>
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
                        <!--<li><a href="cart1.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart </a></li>-->
                        <li><a href="settings.html"><span class="glyphicon glyphicon-user"></span> Settings </a></li>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout </a></li>
                    </ul>
                </div>
            </div>
        </nav>
	<!---->
	 <div class="container-fluid content table-responsive">
            <div class="row decor_bg">
                <div class="col-md-6 col-md-offset-3">
                    <table class="table table-hover table-striped">
                            <tbody>
                                <tr>
									<th>Item </th>
									<th>Item Name</th>
                                    
                                </tr>
								<?php
								  
								  
									if($isValidChecksum == "TRUE") {
										echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
										if ($_POST["STATUS"] == "TXN_SUCCESS") {
											echo "<b>Transaction status is success</b>" . "<br/>";
											//Process your transaction here as success transaction.
											//Verify amount & order id received from Payment gateway with your application's order id and amount.
										}
										else {
											echo "<b>Transaction status is failure</b>" . "<br/>";
										}

										if (isset($_POST) && count($_POST)>0 )
										{ 
											foreach($_POST as $paramName => $paramValue) {
													echo "<tr><td>" . $paramName . "</td><td>" . $paramValue."</td></tr>";
											}
										}
										

									}
									else {
										echo "<b>Checksum mismatched.</b>";
										//Process transaction as suspicious.
									}
																		
										
										?>
										
                                    
                                </tr>
                            </tbody>
                    </table>
					
                </div>
            </div>
        </div>
		
		<footer class="footer-copyright text-center py-3"> 
            <div class="container">
                <center>
                 <p>Copyright 	&#169; Designing Store. All Rights
                Reserved | Contact Us: +91 90000 00000. </p>
                </center>	
            </div>    
        </footer>
	</body>
	</html>