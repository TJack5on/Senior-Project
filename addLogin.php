<!--Use the requre functions to use the session php code and the functions available in the included_functions php file. Verify the login so only users logged in may access the page-->

<<?php require_once("session.php"); ?>
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
	if(isset($_POST["username"]) && $_POST["username"] !== "" && isset($_POST["password"]) && $_POST["password"] !== ""){
		$username=$_POST["username"];
		$password=password_encrypt($_POST["password"]);

		$query = "SELECT * FROM ";
		$query .= "Admins WHERE ";
		$query .= "username='".$username."' ";
		$query .= "LIMIT 1";

		$result = $mysqli->query($query);
		if($result && $result->num_rows>0){
			echo "The username already exists";
			redirect_to('addLogin.php');
			//exit;
		}
		else{
			$query = "INSERT INTO Admins (username, hashed_password) VALUES('{$username}', '{$password}')";
			$result=$mysqli->query($query);

			if($result){
				echo"User Successfully added";
				redirect_to('addLogin.php');
				//exit;
			}
			else{
				echo"Could not add user!";
				redirect_to('addLogin.php');
				//exit;
			}

		}
	

		if ($result && $result->num_rows > 0) {
			echo"The username already exists";
			redirect_to('addLogin.php');
			//exit;

		}
		//User does not already exist so add to admins table
		else {

			if ($result) {
				echo"User successfully added";
				redirect_to('addLogin.php');
				//exit;
			}
			else {

				echo"Could not add user!";
				redirect_to('addLogin.php');
				//exit;

			}
			
		}
	}	
}

?>
		
		<div class='row'>
		<label for='left-label' class='left inline'>

		<h3>Add an Admin!</h3>

	
	<form action="addLogin.php" method="post">
	<p>Username:<input type="text" name="username" /></p>
	<p>Password:<input type="password" name="password" /></p>
	<input type="submit" class="small round button" name="submit" value="submit" />
	</form>	

			<p><br /><br /><hr />
			<h2>Current Admins</h2>
			<?php
				//write and execute query to select admins
			$query="SELECT * FROM Admins";
			$result=$mysqli->query($query);
			if($result && $result->num_rows>0){
				echo "<table>";
				while($row=$result->fetch_assoc()){
					echo"<tr>";
					echo"<td>".$row["username"]."</td>";?>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;<a href="deleteLogin.php?id=<?php echo urlencode($row["id"]);?>" onclick="return confirm('Are you sure?');">Delete</a></td>

					<?php echo "</tr>";
				}
				echo "</table><hr /><br /><br />";
			}
			?>
			
			
			</p>

			
  	  <?php echo "<br /><p>&laquo:<a href='home.php'>Back to Main Page</a>"; ?>
			
	</div>
	</label>

	</body>
	</html>