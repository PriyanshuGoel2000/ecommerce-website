<?php
session_start();
include "conn.php";
echo $_SESSION["Email"];
if(!isset($_SESSION["Email"]))
{
header("refresh:0; url = login.html");
}
$result1 = mysqli_query($conn, "SELECT * FROM product_detail ");
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
                        <li><a href="cart1.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart </a></li>
                        <li><a href="settings.html"><span class="glyphicon glyphicon-user"></span> Settings </a></li>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout </a></li>
                    </ul>
                </div>
            </div>
        </nav>
		
        <div class="container content">
            <!-- Jumbotron Header -->
            <div class="jumbotron home-spacer" id="products-jumbotron">
                <h1>Welcome to your Designing Store!</h1>
                <p>We have the best Designs and Materials for you. No need to hunt around, we have all in one place.</p>

            </div>
            <hr>

            <div class="row text-center" id="dark">
			<?php
				while ($row = mysqli_fetch_array($result1)) {
				//  echo "<div id='img_div'>";
				//	echo "<img src='images/".$row['image']."' >";
				//	echo "<p>".$row['name']."</p>";
				//	echo "<p>".$row['tag']."</p>";
				 // echo "</div>";
			
                echo "<div class='col-md-3 col-sm-6 home-feature'>";
                    echo "<div class='thumbnail'>";
                        echo "<img src='images/".$row['image']."' alt=''>";
                        echo "<div class='caption'>";
                            echo "<h4 name='name' value=".$row['tag'].">".$row['name']." ".$row['tag']."</h4>";
							//echo "<h4>".$row['name']." ".$row['tag']."</h4>";
                            echo "<p name='price' value=".$row['Price'].">Price: Rs.".$row['Price']."/ sq. ft. </p>";
							echo "<button class='btn btn-primary' type='submit'><a href='TxnTest.php?amt=".$row['Price']."&user=".$_SESSION['Email']." ' target='_blank'>Buy Now</a></button>";
							echo "&nbsp";
							echo "<br>";
							echo"<form action='feed_cart.php?tag=".$row['tag']."&image=".$row['image']."&price=".$row['Price']."&user=".$_SESSION['Email']."' method='post'>";
							echo "<br>";
							echo "<button class='btn btn-primary' type='submit'><a href='feed_cart.php'>Add To Cart</a></button>";
							echo "</form>";
                        echo "</div>";
                   echo " </div>";
                echo "</div>";
				echo "<br>";
				
				}
				?>
                <!--<div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="img/2.jpg" alt="">
                        <div class="caption">
                            <h3>Broken Mirror M01</h3>
                            <p>Price: Rs. 80/ sq. ft.</p>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="img/3.jpg" alt="">
                        <div class="caption">
                            <h3>Classical shades C02</h3>
                            <p>Price: Rs. 80/ sq. ft.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="img/4.jpg" alt="">
                        <div class="caption">
                            <h3>Classical Mirror C03</h3>
                            <p>Price: Rs. 80/ sq. ft.</p>
                        </div>
                    </div>
                </div>-->
            </div>

            <div class="row text-center" id="Symmetric">
                <!--<div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="img/9.jpg" alt="">
                        <div class="caption">
                            <h3>Classical Vines C04 </h3>
                            <p>Price: Rs. 80/ sq. ft.</p>
							<button class="button button1" onclick="document.location=''">Buy Now</button>
							<button class="buybtn" onclick="document.location='cart.html'">Add to Cart</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="img/10.jpg" alt="">
                        <div class="caption">
                            <h3>Classical Vines C05</h3>
                            <p>Price: Rs. 80/ sq. ft.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="img/11.jpg" alt="">
                        <div class="caption">
                            <h3>Dark D01</h3>
                            <p>Price: Rs. 80/ sq. ft.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="img/12.jpg" alt="">
                        <div class="caption">
                            <h3>Dark D02</h3>
                            <p>Price: Rs. 80/ sq. ft.</p>
                        </div>
                    </div>
                </div>-->
            </div>

            <div class="row text-center" id="Classical">
					<!--<div class="col-md-3 col-sm-6 home-feature">
						<div class="thumbnail">
							<img src="img/8.jpg" alt="">
							<div class="caption">
								<h3>Classical Shades C06</h3>
								<p>Price: Rs. 80/ sq. ft.</p>
							</div>
						</div>
					</div>

					<div class="col-md-3 col-sm-6 home-feature">
						<div class="thumbnail">
							<img src="img/6.jpg" alt="">
							<div class="caption">
								<h3>Symmetric Arrow S01</h3>
								<p>Price: Rs. 80/ sq. ft.</p>
							</div>
						</div>
					</div>

					<div class="col-md-3 col-sm-6 home-feature">
						<div class="thumbnail">
							<img src="img/13.jpg" alt="">
							<div class="caption">
								<h3>Symmetric Inverted Arrow S02</h3>
								<p>Price: Rs. 80/ sq. ft.</p>
								</a>
							</div>
						</div>
					</div>

					<div class="col-md-3 col-sm-6 home-feature">
						<div class="thumbnail">
							<img src="img/14.jpg" alt="">
							<div class="caption">
								<h3>Symmetric Maze S03</h3>
								<p>Price: Rs. 80/ sq. ft.</p>
							</div>
						</div>
					</div>-->

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
