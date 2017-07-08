<!--Use the requre functions to use the session php code and the functions available in the included_functions php file. Verify the login so only users logged in may access the page-->
<?php require_once("session.php"); ?>
<?php 
	require_once("included_functions.php");
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
			<a href="http://turing.cs.olemiss.edu/~ltjacks1/SeniorProject/index.php">
			<img class="left" src="images/footer-logo.png" alt="Ole Miss Logo" style="width:175px; height:60px;"> 
			Department of Computer Science
			<img class="right" src="images/OleMissLogo.svg.png" alt="Ole Miss Seal" style="width:130px; height:60px;">
			</a>
		</h1>
	</header>



<?php 

//query the entry and log in to the site if an admin
if(isset($_POST["submit"])){
	if(isset($_POST["username"]) && $_POST["username"] !== "" && isset($_POST["password"]) && $_POST["password"] !== ""){
		$username=$_POST["username"];
		$password=$_POST["password"];

		$query="SELECT * FROM ";
		$query.="Admins WHERE ";
		$query.="username='".$username."' ";
		$query.="LIMIT 1";

		$result=$mysqli->query($query);
		if($result && $result->num_rows>0){
			$row=$result->fetch_assoc();
			if(password_check($password,$row["hashed_password"])){
				$_SESSION["username"]=$row["username"];
				$_SESSION["admin_id"]=$row["id"];
				header("Location: home.php");
				exit;
			}
			else{
				$_SESSION["message"]="Username/Password not found";
				header("Location: index.php");
				exit;
			}
		}

		else{
			$_SESSION["message"]="Username/Password not found";
			header("Location: index.php");
			exit;
		}
	}
}



?>

		<div class='row'>
		<label for='left-label' class='left inline'>
	
		<h3>Please log in:</h3>
		
			
	<form action="index.php" method="post">
	<p>Username:<input type="text" name="username" /></p>
	<p>Password:<input type="password" name="password" /></p>
	<input type="submit" class = "button small round" name="submit" value="submit" />
	</form>			
				
	</div>
	</label>
	</body>
	</html>