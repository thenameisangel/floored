<?php
// Import data scraping function
include('scrape.php');

################################################################################

print <<<BODY

<!DOCTYPE html>
<html>
<head>
	<title>Floored - Track Product Prices</title>

	<!-- import google fonts -->
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- import materialize.css -->
	<link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
	<!-- optimize browser for mobile -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<!-- floored custom css -->
	<link rel="stylesheet" type="text/css" href="../css/floored.css">
	<!-- import logo -->
	<link rel="icon" type="image/x-icon" href="../img/logo/favicon.ico"/>
</head>

<body>

	<!-- <script>
	function show(){
		document.getElementById(id).style.visibility="visible";
	}

	function hide(){
		document.getElementById(id).style.visibility = "hidden";
	}
	</script> -->

	<div class="navbar">
		<section class="nav">
			<ul>
<<<<<<< HEAD:php/index.php
				<li class="logo-link">
					<img class="favicon" src="../img/logo/logo-small.png"></li>
					<li><a href="../html/about.html">ABOUT</a></li>
					<li><a href="../html/contact.html">CONTACT</a></li>
=======
				<li class="logo-link"><a href="index.html">
					<img class="favicon" src="../img/logo/logo-small.png"></a></li>
					<li><a href="about.html">ABOUT</a></li>
					<li><a href="contact.html">CONTACT</a></li>
>>>>>>> 2c93052881c0c26d8a90e645afd3b39e447a3422:public_html/index.html
				</ul>

			</section>

			<section class="settings">
<<<<<<< HEAD:php/index.php
				<a href="login.php">LOGIN</a>
=======
				<a href="../php/login.php">LOGIN</a>
>>>>>>> 2c93052881c0c26d8a90e645afd3b39e447a3422:public_html/index.html
			</section>
		</div>

		<section class="main">
			<img class="logo-large" src="../img/logo/floored-logo.png" alt="Floored Logo">
			<div id="wrapper">
				<input type="url" id="url_field" name="url" value="" placeholder="Enter the url of a product to begin tracking" />
				<input type="submit" onsubmit="" value="TRACK">
			</div>
		</section>

		<section class="products">
			<div class="product-col">
				<ul>
					<li>
						<a href="redirect.html">
							<figure class="item" id="col1">
								<img class="product-image" src="../img/products/bike.jpg" width="100" height="75"/>
							</figure>
						</a>
					</li>
					<li>
						<a href="redirect.html"><figure class="item">
							<img class="product-image" src="../img/products/mandolin.jpg" width="150" height="150"/>
						</figure></a>
					</li>
					<li>
						<a href="redirect.html"><figure class="item">
							<img class="product-image" src="../img/products/earrings.jpg" width="100" height="75"/>
						</figure></a>
					</li>
				</ul>
			</div>
			<div class="product-col" id="col2">
				<ul>
					<li>
						<a href="redirect.html"><figure class="item">
							<img class="product-image" src="../img/products/dress.jpg" width="100" height="75"/>
						</figure></a>
					</li>
					<li>
						<a href="redirect.html"><figure class="item">
							<img class="product-image" src="../img/products/tent.jpg" width="150" height="150"/>
						</figure></a>
					</li>
					<li>
						<a href="redirect.html"><figure class="item">
							<img class="product-image" src="../img/products/couch.jpg" width="100" height="75"/>
						</figure></a>
					</li>
				</ul>
			</div>
			<div class="product-col" id="col3">
				<ul>
					<li>
						<a href="redirect.html"><figure class="item">
							<img class="product-image" src="../img/products/headphones.jpg" width="100" height="75"/>
						</figure></a>
					</li>
					<li>
						<a href="redirect.html"><figure class="item">
							<img class="product-image" src="../img/products/guitar.jpg" width="150" height="150"/>
						</figure></a>
					</li>
					<li>
						<a href="redirect.html"><figure class="item">
							<img class="product-image" src="../img/products/spoon.jpg" width="100" height="75"/>
						</figure></a>
					</li>
				</ul>
			</div>
		</section>

		<footer class="page-footer">
			<div class="container">
				<div class="row">
					<div class="col l6 s12">
						<h5 class="white-text">Floored</h5>
						<p class="grey-text text-lighten-4">Follow us on social media!</p>
					</div>
					<div class="col l4 offset-l2 s12">
						<h5 class="white-text">Site Map</h5>
						<ul>
<<<<<<< HEAD:php/index.php
							<li><a class="grey-text text-lighten-3" href="index.php">Home</a></li>
							<li><a class="grey-text text-lighten-3" href="login.php">Login</a></li>
							<li><a class="grey-text text-lighten-3" href="../html/about.html">About</a></li>
							<li><a class="grey-text text-lighten-3" href="../contact.html">Contact Us</a></li>
=======
							<li><a class="grey-text text-lighten-3" href="index.html">Home</a></li>
							<li><a class="grey-text text-lighten-3" href="../php/login.php">Login</a></li>
							<li><a class="grey-text text-lighten-3" href="about.html">About</a></li>
							<li><a class="grey-text text-lighten-3" href="contact.html">Contact Us</a></li>
>>>>>>> 2c93052881c0c26d8a90e645afd3b39e447a3422:public_html/index.html
						</ul>
					</div>
				</div>
			</div>
			<div class="footer-copyright">
				<div class="container">
					© 2014 Copyright Angel Lo and Samantha Huang
				</div>
			</div>
		</footer>

		<!-- import materialize js files -->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="../js/materialize.min.js"></script>
</body>
</html>

BODY;

################################################################################

?>
