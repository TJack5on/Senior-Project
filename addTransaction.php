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
<?php

	//When the submit button is clicked check if entry is empty. If not then query the database and add the result to the database.
if(isset($_POST["submit"])){
	if(isset($_POST["AccountNumber"]) && $_POST["AccountNumber"]!== '' && (isset($_POST["Signatory"]) && $_POST["Signatory"] !== '')&& (isset($_POST["DateOfPurchase"]) && $_POST["DateOfPurchase"] !== '')&& (isset($_POST["Vendor"]) && $_POST["Vendor"] !== '')&& (isset($_POST["PurchDescript"]) && $_POST["PurchDescript"] !== '')&& (isset($_POST["RequestedBy"]) && $_POST["RequestedBy"] !== '')&& (isset($_POST["PurchaseCode"]) && $_POST["PurchaseCode"] !== '')&& (isset($_POST["CCDescript"]) && $_POST["CCDescript"] !== '')&& (isset($_POST["GLCodeID"]) && $_POST["GLCodeID"] !== '')&& (isset($_POST["Price"]) && $_POST["Price"] !== '')){
		$query="INSERT INTO Transaction(TransactionNum, AccountNumber, SignatoryID, DateOfPurchase, VendorID, PurchDescript, RequestedBy, PurchaseCode, CCDescript, GLCodeID, Price) VALUES('','".$_POST["AccountNumber"]."', '".$_POST["Signatory"]."', '".$_POST["DateOfPurchase"]."', '".$_POST["Vendor"]."', '".$_POST["PurchDescript"]."', '".$_POST["RequestedBy"]."', '".$_POST["PurchaseCode"]."', '".$_POST["CCDescript"]."', '".$_POST["GLCodeID"]."', '".$_POST["Price"]."')";
		$result=$mysqli->query($query);
		if($result){
			echo "Add Successful";
			redirect_to('addTransaction.php');
		}
		else{
			echo "Add Failed";
		}	
	}
	else{
		echo "Transaction not added. Leave no field blank.";
		redirect_to('addTransaction.php');
	}
}
else{
?>
<div class="row">
<label for="left-label" class="left inline">

<h2>Add New Transaction</h2>
<h4>Leave no field blank</h4>

<form method="post" action="addTransaction.php">
	<p>Account Number: <select name="AccountNumber"></p>
	<option></option>

	<?php


//This grabs data from the database to be shown in the dropdown menu then used for the query above
		$query = "SELECT AccountNumber, SignatoryName FROM Account NATURAL JOIN Owner ORDER BY AccountNumber ASC";
		$result = $mysqli->query($query);

		if($result&&$result->num_rows>=1){
			while($row=$result->fetch_assoc()){
				echo "<option value='".$row['AccountNumber']."'>".$row['AccountNumber']." - ".$row['SignatoryName']."</option>";
			}
		}
		else {echo "<h2>No query results</h2>";}
	?>
	</select>

	<p>Signatory: <select name="Signatory"></p>
	<option></option>

	<?php
		$query = "SELECT SignatoryName, SignatoryID FROM Owner GROUP BY SignatoryName ASC";
		$result = $mysqli->query($query);

		if($result&&$result->num_rows>=1){
			while($row=$result->fetch_assoc()){
				echo "<option value='".$row['SignatoryID']."'>".$row['SignatoryName']."</option>";
			}
		}
		else {echo "<h2>No query results</h2>";}
	?>
	</select>

	<p>Enter The Date of Purchase: (YYYY-MM-DD) <input type ="text" name="DateOfPurchase" /></p>

	<p>Vendor: <select name="Vendor"></p>
	<option></option>

	<?php
		$query = "SELECT VendorName, VendorID FROM Vendor GROUP BY VendorName ASC";
		$result = $mysqli->query($query);

		if($result&&$result->num_rows>=1){
			while($row=$result->fetch_assoc()){
				echo "<option value='".$row['VendorID']."'>".$row['VendorName']."</option>";
			}
		}
		else {echo "<h2>No query results</h2>";}
	?>
	</select>

	<p>Enter a Short Description of the Purchase: (e.g. Food for banquet) <input type ="text" name="PurchDescript" /></p>

	<p>Requested by: <input type ="text" name="RequestedBy" /></p>

	<p>Purchase Code: <select name="PurchaseCode"></p>
	<option></option>

	<?php
		$query = "SELECT PurchaseCode FROM HowPurchased";
		$result = $mysqli->query($query);

		if($result&&$result->num_rows>=1){
			while($row=$result->fetch_assoc()){
				echo "<option value='".$row['PurchaseCode']."'>".$row['PurchaseCode']."</option>";
			}
		}
		else {echo "<h2>No query results</h2>";}
	?>
	</select>

	<p>CC Doc Number: (10 digits - Put 'N/A' if not applicable) <input type ="text" name="CCDescript" /></p>

	<p>GL Code: <select name="GLCodeID"></p>
	<option></option>

	<?php
		$query = "SELECT GLCodeID FROM GLCode";
		$result = $mysqli->query($query);

		if($result&&$result->num_rows>=1){
			while($row=$result->fetch_assoc()){
				echo "<option value='".$row['GLCodeID']."'>".$row['GLCodeID']."</option>";
			}
		}
		else {echo "<h2>No query results</h2>";}
	?>
	</select>

	<p>Price: (Decimal format e.g. 234.43) <input type ="text" name="Price" /></p>

   <input type="submit" class="button large round" name="submit" value="Add Transaction"></input>
</form>
</label>
</div>

<?php
}
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://turing.cs.olemiss.edu/~ltjacks1/SeniorProject/home.php">Click here to return to the index page.</a><br><br><br>
</body>
</html>