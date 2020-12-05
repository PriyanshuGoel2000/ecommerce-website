<?php
session_start();
include "conn.php";
echo $_SESSION["Email"];
if(!isset($_SESSION["Email"]))
{
header("refresh:0; url = login.html");
}
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
                        <li><a href="cart.html"><span class="glyphicon glyphicon-shopping-cart"></span> Cart </a></li>
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
                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="img/5.jpg" alt="">
                        <div class="caption">
                            <h3>Classical C01</h3>
                            <p>Price: Rs. 80/ sq. ft. </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
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
                </div>
            </div>

            <div class="row text-center" id="Symmetric">
                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="img/9.jpg" alt="">
                        <div class="caption">
                            <h3>Classical Vines C04 </h3>
                            <p>Price: Rs. 80/ sq. ft.</p>
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
                </div>
            </div>

            <div class="row text-center" id="Classical">
					<div class="col-md-3 col-sm-6 home-feature">
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
