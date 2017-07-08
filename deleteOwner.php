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
	if(isset($_POST["owner"]) && $_POST["owner"]!== ''){
		$query2="UPDATE Transaction SET SignatoryID=1 WHERE SignatoryID='".$_POST["owner"]."'";
		$query3="DELETE FROM Account WHERE SignatoryID'".$_POST["owner"]."'";
		$query="DELETE FROM Owner WHERE SignatoryID='".$_POST["owner"]."'";
		$result2=$mysqli->query($query2);
		$result=$mysqli->query($query);
		$result3=$mysqli->query($query3);
		if($result){
			echo "Delete Successful";
			redirect_to('deleteOwner.php');
		}
		else{
			echo "Delete Failed";
		}
		
	}
}
else{
?>
<div class="row">
<label for="left-label" class="left inline">

<h2>Delete Account Owner</h2>

<form method="post" action="deleteOwner.php">
Select Owner to Delete:
<select name="owner">
<option></option>

<?php

//This grabs data from the database to be shown in the dropdown menu then used for the query above
	$query= "SELECT * FROM Owner ORDER BY SignatoryName ASC";
	$result=$mysqli->query($query);
	if($result&&$result->num_rows>=1){
		while($row=$result->fetch_assoc()){
			echo "<option value='".$row['SignatoryID']."'>".$row['SignatoryName']."</option>";
		}
	}
		else {echo "<h2>No query results</h2>";}
?>

</select>

<input type="submit" class="button large round" name="submit" onclick="return confirm('Are you sure?')" value="Delete Account"></input>
   
</form>
</label>
</div>

<?php
}
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://turing.cs.olemiss.edu/~ltjacks1/SeniorProject/home.php">Click here to return to the index page.</a><br><br><br>
</body>
</html>