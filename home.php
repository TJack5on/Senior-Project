<!--Use the requre functions to use the session php code and the functions available in the included_functions php file. Verify the login so only users logged in may access the page-->

<?php
require_once("session.php");
require_once("included_functions.php");
verify_login();
$mysqli = db_connection();
?>

<!DOCTYPE html>


<html>
<!--HTML and CSS code to style the site-->
	<head>
		<link rel="stylesheet" href="css/SPStyles.css">
		<link rel="stylesheet" href="css/foundation.css">
		<script src="js/vendor/modernizr.js"></script>
		<title> CS Finance Page </title>
	</head>

	<body>

	<header>
		<h4 class = "header"> Welcome to the CS Finance Page! </h4>
		<h1> 
			<a href="http://turing.cs.olemiss.edu/~ltjacks1/SeniorProject/home.php">
			<img class="left" src="images/footer-logo.png" alt="Ole Miss Logo" style="width:175px; height:60px;"> 
			Department of Computer Science
			<img class="right" src="images/OleMissLogo.svg.png" alt="Ole Miss Seal" style="width:130px; height:60px;">
			</a>
		</h1>
	</header>
	<br><br>
	<h2>Select a page to continue.</h2>


	<!--Create buttons for navigation around the site-->
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<center><a href="http://turing.cs.olemiss.edu/~ltjacks1/SeniorProject/search.php" class="button">Search for transactions.</a></center>

	<center><a href="http://turing.cs.olemiss.edu/~ltjacks1/SeniorProject/addTransaction.php" class = "button">Add new transactions.</a></center>

	<center><a href="http://turing.cs.olemiss.edu/~ltjacks1/SeniorProject/addAccount.php" class = "button">Add new accounts.</a></center>

	<center><a href="http://turing.cs.olemiss.edu/~ltjacks1/SeniorProject/addOwner.php" class = "button">Add new signatorys</a></center>

	<center><a href="http://turing.cs.olemiss.edu/~ltjacks1/SeniorProject/addGLCode.php" class = "button">Add new GL Codes.</a></center>

	<center><a href="http://turing.cs.olemiss.edu/~ltjacks1/SeniorProject/addVendor.php" class = "button">Add new vendors.</a></center>

	<center><a href="http://turing.cs.olemiss.edu/~ltjacks1/SeniorProject/deleteOwner.php" class = "button">Delete account owners</a></center>

	<center><a href="http://turing.cs.olemiss.edu/~ltjacks1/SeniorProject/addLogin.php" class = "button">Add a new user</a></center>
	<br>

	<!--Create link to use to logout of the site-->
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href = "logout.php">Click here to logout</a><br><br><br>


</body>
</html>