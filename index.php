<?php 
session_start();
?>
<html>
	<head>
		<title>Business Directory - Find Business Online</title>
		<link rel="stylesheet" type="text/css" href="CSS/style1.css">
	</head>
	
	<body>		

		<header id="header">
				<img src = "images/logo.jpg" height = "100px" width = "500px" float = "left">
				<h2>Find All Companies in One Place</h2>
			
		
		</header>

		<nav id="nav">
			<div class="textpad">
				<a href = "http://localhost/Assignment/index.php">Home</a>
				<a href="html/Aboutus.html" target="home">About</a>
				<a href = "html/help.html">Help</a>
				<a href="http://localhost/Assignment/functions/register.php"style="float:right">Signup</a>
				<a href="http://localhost/Assignment/functions/login.php" style="float:right">Login</a>
			</div>
		</nav>

		<iframe src = "categories/home.php" name = "home" height="100%" width="100%" ></iframe> 
			
		<footer id="footer">
			<div class="textpad">
				<p>Company details management system</p>
			</div>
		</footer>
	</body>
</html>
