
<!--Use the requre functions to use the session php code and the functions available in the included_functions php file. Verify the login so only users logged in may access the page-->
<?php require_once("session.php"); ?>
<?php 
	require_once("included_functions.php");
	verify_login();
	
	$mysqli = db_connection();


	if (($output = message()) !== null) {
		echo $output;
	}

if (($output = message()) !== null) {
	echo $output;
}

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
			<a href="http://turing.cs.olemiss.edu/~ltjacks1/SeniorProject/index.php">
			<img class="left" src="images/footer-logo.png" alt="Ole Miss Logo" style="width:175px; height:60px;"> 
			Department of Computer Science
			<img class="right" src="images/OleMissLogo.svg.png" alt="Ole Miss Seal" style="width:130px; height:60px;">
			</a>
		</h1>
	</header>
	<?php
//Get this admins ID and delete from the database
	$id=$_GET["id"];
	$query="DELETE FROM Admins WHERE id={$id}";

// Execute query
	$result=$mysqli->query($query);


if($result) {
	echo"User deleted";
	redirect_to('addLogin.php');
}
else {
	echo "Unable to delete user";
	redirect_to('addLogin.php');
}
	
?>

</body>
</html>