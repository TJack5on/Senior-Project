<!--Use the requre functions to use the session php code and the functions available in the included_functions php file. Verify the login so only users logged in may access the page-->
<?php require_once("session.php"); ?>
<?php
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
	<?php
	//When the submit button is clicked check if entry is empty. If not then query the database and add the result to the database.
	if(isset($_POST["submit"])){
		if(isset($_POST["name"]) && $_POST["name"]!== ''){
			$query="INSERT INTO Vendor(VendorID,VendorName) VALUES('','".$_POST["name"]."')";
			$result=$mysqli->query($query);
			if($result){
				echo "Add Successful";
				redirect_to('addVendor.php');
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

				<h2>Add New Vendor</h2>

				<form method="post" action="addVendor.php">
					<p>Enter The Name of the New Vendor: <input type ="text" name="name" /></p>

					<input type="submit" class="button large round" name="submit" value="Add Vendor"></input>
					
				</form>
			</label>
		</div>

		<?php
	}
	?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://turing.cs.olemiss.edu/~ltjacks1/SeniorProject/home.php">Click here to return to the index page.</a><br><br><br>
</body>
</html>