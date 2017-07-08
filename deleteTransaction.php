<!--Use the requre functions to use the session php code and the functions available in the included_functions php file. Verify the login so only users logged in may access the page-->

<?php 
require_once("included_functions.php");
require_once("session.php");

$mysqli = db_connection();
?>
<?php
	if(isset($_GET["id"]) && $_GET["id"] !== ""){
					
		$ID=$_GET["id"];
		$query="DELETE FROM Transaction WHERE TransactionNUM={$ID}";		

				
				// Execute query
		$result=$mysqli->query($query);
		if ($result && $mysqli->affected_rows === 1) {
			$_SESSION["message"] = "Transaction successfully deleted!";
			$output = message();
			echo $output;
			echo "<br /><br /><p>&laquo:<a href='search.php'>Back to Main Page</a>";

		}
		else {
		$_SESSION["message"] = "Transaction could not be deleted!";
		$output = message();
		echo $output;
		header("Location: search.php");
		exit;
		}
	}
	else {
		$_SESSION["message"] = "Transaction could not be found!";
		$output = message();
		echo $output;
		header("Location: search.php");
		exit;
	}
?>