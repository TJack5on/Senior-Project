<!--Use the requre functions to use the session php code and the functions available in the included_functions php file. Verify the login so only users logged in may access the page-->
<?php require_once("session.php"); ?>
<?php
	require_once("included_functions.php");
	$mysqli = db_connection();
	verify_login();
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
<?php

//When the submit button is clicked check if entry is empty. If not then query the database and add teh result to the database.
if(isset($_POST["submit"])){
	if(isset($_POST["GLCodeID"]) && $_POST["GLCodeID"]!== '' && (isset($_POST["GLDescript"]) && $_POST["GLDescript"] !== '')){
		$query="INSERT INTO GLCode(GLCodeID, GLDescript) VALUES('".$_POST["GLCodeID"]."', '".$_POST["GLDescript"]."')";
		$result=$mysqli->query($query);
		if($result){
			echo "Add Successful";
			redirect_to('addGLCode.php');
		}
		else{
			echo "Add Failed";
		}
		
	}
}
else{
?>
<div class="row">
<label for="left-label" class="left inline">

<h2>Add Account to Existing User</h2>

<form method="post" action="addGLCode.php">

<p>Enter The GL Code ID to Add: (5 digits) <input type ="text" name="GLCodeID" /></p>

<p>Enter The GL Code Description: (shorter the better) <input type ="text" name="GLDescript" /></p>
 
<input type="submit" class="button large round" name="submit" value="Add GL Code"></input>

</form>
</label>
</div>

<?php
}
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://turing.cs.olemiss.edu/~ltjacks1/SeniorProject/home.php">Click here to return to the index page.</a><br><br><br>
</body>
</html>