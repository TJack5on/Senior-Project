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
		if(isset($_POST["account"]) && $_POST["account"] !== ''){
			$accountQuery="SELECT TransactionNum, AccountNumber, SignatoryName, DateOfpurchase, VendorName, RequestedBy, PurchDescript, PurchaseCode, CCDescript, GLCodeID, GLDescript, Price FROM Transaction NATURAL JOIN Owner NATURAL JOIN Vendor NATURAL JOIN GLCode NATURAL JOIN HowPurchased WHERE AccountNumber = '".$_POST["account"]."'";
			$accountresult = $mysqli->query($accountQuery);
			echo "<table style='margin:auto; background: white' border='1'>";
			echo "<tr><th>Account Num.</th><th>Owner</th><th>Date of Purchase</th><th>Vendor</th><th>Requested By</th><th>Purch. Description</th><th>Purch. Code</th><th>CC Doc Num</th><th>GL Code</th><th>GL Description</th><th>Price</th><th>EDIT</th><th>DELETE</th></tr>";
			while($row = $accountresult->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$row["AccountNumber"]."</td>";
				echo "<td>". $row["SignatoryName"]."</td>";
				echo "<td>".$row["DateOfpurchase"]."</td>";
				echo "<td>".$row["VendorName"]."</td>";
				echo "<td>".$row["RequestedBy"]."</td>";
				echo "<td>".$row["PurchDescript"]."</td>";
				echo "<td>".$row["PurchaseCode"]."</td>";
				echo "<td>".$row["CCDescript"]."</td>";
				echo "<td>".$row["GLCodeID"]."</td>";
				echo "<td>".$row["GLDescript"]."</td>";
				echo "<td>".$row["Price"]."</td>";
				?>

			<td>&nbsp;<a href="editTransactions.php?id=<?php echo urlencode($row["TransactionNum"]);?>">Edit</a>&nbsp;&nbsp;</td>
			<td>&nbsp;<a href="deleteTransaction.php?id=<?php echo urlencode($row["TransactionNum"]);?>" onclick="return confirm('Are you sure');">Delete</a>&nbsp;&nbsp;</td>
<?php
				echo "</tr>";
			}
			echo "</table>";
		}
		//When the submit button is clicked check if entry is empty. If not then query the database and add the result to the database.
		elseif(isset($_POST["owner"]) && $_POST["owner"] !== ''){
			$accountQuery="SELECT TransactionNum, AccountNumber, SignatoryName, DateOfpurchase, VendorName, RequestedBy, PurchDescript, PurchaseCode, CCDescript, GLCodeID, GLDescript, Price FROM Transaction NATURAL JOIN Owner NATURAL JOIN Vendor NATURAL JOIN GLCode NATURAL JOIN HowPurchased WHERE SignatoryID = '".$_POST["owner"]."'";
			$accountresult = $mysqli->query($accountQuery);
			echo "<table style='margin:auto; background: white' border='1'>";
			echo "<tr><th>Account Num.</th><th>Owner</th><th>Date of Purchase</th><th>Vendor</th><th>Requested By</th><th>Purch. Description</th><th>Purch. Code</th><th>CC Doc Num</th><th>GL Code</th><th>GL Description</th><th>Price</th><th>EDIT</th><th>DELETE</th></tr>";
			while($row = $accountresult->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$row["AccountNumber"]."</td>";
				echo "<td>". $row["SignatoryName"]."</td>";
				echo "<td>".$row["DateOfpurchase"]."</td>";
				echo "<td>".$row["VendorName"]."</td>";
				echo "<td>".$row["RequestedBy"]."</td>";
				echo "<td>".$row["PurchDescript"]."</td>";
				echo "<td>".$row["PurchaseCode"]."</td>";
				echo "<td>".$row["CCDescript"]."</td>";
				echo "<td>".$row["GLCodeID"]."</td>";
				echo "<td>".$row["GLDescript"]."</td>";
				echo "<td>".$row["Price"]."</td>";
				?>

			<td>&nbsp;<a href="editTransactions.php?id=<?php echo urlencode($row["TransactionNum"]);?>">Edit</a>&nbsp;&nbsp;</td>
			<td>&nbsp;<a href="deleteTransaction.php?id=<?php echo urlencode($row["TransactionNum"]);?>" onclick="return confirm('Are you sure');">Delete</a>&nbsp;&nbsp;</td>
<?php
				echo "</tr>";
			}
			echo "</table>";
		}
		//When the submit button is clicked check if entry is empty. If not then query the database and add the result to the database.
		elseif((isset($_POST["firstDate"]) && $_POST["firstDate"] !== '') && (isset($_POST["secondDate"]) && $_POST["secondDate"] !== '')){
			$accountQuery="SELECT TransactionNum, AccountNumber, SignatoryName, DateOfpurchase, VendorName, RequestedBy, PurchDescript, PurchaseCode, CCDescript, GLCodeID, GLDescript, Price FROM Transaction NATURAL JOIN Owner NATURAL JOIN Vendor NATURAL JOIN GLCode NATURAL JOIN HowPurchased WHERE DateOfpurchase BETWEEN DATE('".$_POST["firstDate"]."') AND DATE('". $_POST["secondDate"]."')";
			$accountresult = $mysqli->query($accountQuery);
			echo "<table style='margin:auto; background: white' border='1'>";
			echo "<tr><th>Account Num.</th><th>Owner</th><th>Date of Purchase</th><th>Vendor</th><th>Requested By</th><th>Purch. Description</th><th>Purch. Code</th><th>CC Doc Num</th><th>GL Code</th><th>GL Description</th><th>Price</th><th>EDIT</th><th>DELETE</th></tr>";
			while($row = $accountresult->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$row["AccountNumber"]."</td>";
				echo "<td>".$row["SignatoryName"]."</td>";
				echo "<td>".$row["DateOfpurchase"]."</td>";
				echo "<td>".$row["VendorName"]."</td>";
				echo "<td>".$row["RequestedBy"]."</td>";
				echo "<td>".$row["PurchDescript"]."</td>";
				echo "<td>".$row["PurchaseCode"]."</td>";
				echo "<td>".$row["CCDescript"]."</td>";
				echo "<td>".$row["GLCodeID"]."</td>";
				echo "<td>".$row["GLDescript"]."</td>";
				echo "<td>".$row["Price"]."</td>";
				?>

			<td>&nbsp;<a href="editTransactions.php?id=<?php echo urlencode($row["TransactionNum"]);?>">Edit</a>&nbsp;&nbsp;</td>
			<td>&nbsp;<a href="deleteTransaction.php?id=<?php echo urlencode($row["TransactionNum"]);?>" onclick="return confirm('Are you sure');">Delete</a>&nbsp;&nbsp;</td>
<?php
				echo "</tr>";
			}
			echo "</table>";
		}

		else{

		}
	}
	//When the submit button is clicked query the database and add the result to the database.
	elseif(isset($_POST["getAll"])){
		$accountQuery="SELECT TransactionNum, AccountNumber, SignatoryName, DateOfpurchase, VendorName, RequestedBy, PurchDescript, PurchaseCode, CCDescript, GLCodeID, GLDescript, Price FROM Transaction NATURAL JOIN Owner NATURAL JOIN Vendor NATURAL JOIN GLCode NATURAL JOIN HowPurchased ORDER BY DateOfpurchase ASC";
		$accountresult = $mysqli->query($accountQuery);
		echo "<table style='margin:auto; background: white' border='1'>";
		echo "<tr><th>Account Num.</th><th>Owner</th><th>Date of Purchase</th><th>Vendor</th><th>Requested By</th><th>Purch. Description</th><th>Purch. Code</th><th>CC Doc Num</th><th>GL Code</th><th>GL Description</th><th>Price</th><th>EDIT</th><th>DELETE</th></tr>";
		while($row = $accountresult->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$row["AccountNumber"]."</td>";
			echo "<td>".$row["SignatoryName"]."</td>";
			echo "<td>".$row["DateOfpurchase"]."</td>";
			echo "<td>".$row["VendorName"]."</td>";
			echo "<td>".$row["RequestedBy"]."</td>";
			echo "<td>".$row["PurchDescript"]."</td>";
			echo "<td>".$row["PurchaseCode"]."</td>";
			echo "<td>".$row["CCDescript"]."</td>";
			echo "<td>".$row["GLCodeID"]."</td>";
			echo "<td>".$row["GLDescript"]."</td>";
			echo "<td>".$row["Price"]."</td>";
?>
			<td>&nbsp;<a href="editTransactions.php?id=<?php echo urlencode($row["TransactionNum"]);?>">Edit</a>&nbsp;&nbsp;</td>
			<td>&nbsp;<a href="deleteTransaction.php?id=<?php echo urlencode($row["TransactionNum"]);?>" onclick="return confirm('Are you sure');">Delete</a>&nbsp;&nbsp;</td>
<?php
			echo "</tr>";
		}
		echo "</table>";
	}

//	elseif(isset($_POST["Export2"])){
//		$query="SELECT * FROM Transaction INTO OUTFILE 'filename.csv'";
//		$result=$mysqli->query($query);
//	}

	else{
		?>
		<div class="row">
			<label for="left-label" class="left inline">

				<h2>Search Transactions</h2>

				<form method="post" action="search.php">

					Choose The Account Number:
					<select name="account">
						<option></option>

						<?php
						$query="SELECT AccountNumber FROM Account GROUP BY AccountNumber ASC";
						$result=$mysqli->query($query);

						if($result&&$result->num_rows>=1){
							while($row=$result->fetch_assoc()){
								echo "<option value='".$row['AccountNumber']."'>".$row['AccountNumber']."</option>";
							
							}

						}
						else {echo "<h2>No query results</h2>";}
						
						?>
					</select>

					<p /><hr>&nbsp;&nbsp;&nbsp;<b>OR</b> &nbsp;&nbsp;&nbsp;<hr> <p />

					<p>Account Owner Name: <select name="owner"></p>
					<option></option>

					<?php
					$query = "SELECT * FROM Owner ORDER BY SignatoryName ASC";
					$result = $mysqli->query($query);

					if($result&&$result->num_rows>=1){
						while($row=$result->fetch_assoc()){
							echo "<option value='".$row['SignatoryID']."'>".$row['SignatoryName']."</option>";
						}
					}
					else {echo "<h2>No query results</h2>";}
					?>
				</select>

				<p /><hr>&nbsp;&nbsp;&nbsp;<b>OR</b> &nbsp;&nbsp;&nbsp;<hr> <p />

			<p>Date: <select name="firstDate">
				<option></option>

				<?php
				$query = "SELECT DateOfpurchase FROM Transaction ORDER BY DateOfpurchase ASC";
				$result = $mysqli->query($query);

				if($result&&$result->num_rows>=1){
					while($row=$result->fetch_assoc()){
						echo "<option value='".$row['DateOfpurchase']."'>".$row['DateOfpurchase']."</option>";
					}
				}
				else {echo "<h2>No query results</h2>";
			}
			?>
		</select>

		Between 
		<select name="secondDate">
			<option></option>

			<?php
			$query = "SELECT DateOfpurchase FROM Transaction ORDER BY DateOfpurchase ASC";
			$result = $mysqli->query($query);

			if($result&&$result->num_rows>=1){
				while($row=$result->fetch_assoc()){
					echo "<option value='".$row['DateOfpurchase']."'>".$row['DateOfpurchase']."</option>";
				}
			}

			else {
				echo "<h2>No query results</h2>";
			}
			?>
		</select>
	</p>

	<input type="submit" class="button large round" name="submit" value="Find Transactions"></input>
	<br>
	<!--<input type="submit" class="button large round" name="Export" value="Export"></input>-->


</form>
<p /><hr>&nbsp;&nbsp;&nbsp;<b>OR</b> &nbsp;&nbsp;&nbsp;<hr> <p />
<form method="post" action="search.php">
	<input type="submit" class="button large round" name="getAll" value="Find All Transactions"></input>
	<br>
	<!--<input type="submit" class="button large round" name="Export2" value="Export All"></input>-->

</form>
</label>
</div>

<?php
}
?>
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://turing.cs.olemiss.edu/~ltjacks1/SeniorProject/home.php">Click here to return to the index page.</a><br><br><br>
</body>
</html>