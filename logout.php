<!--Functions used to log out of the site-->

<?php require_once("session.php"); ?>

<?php 
	require_once("included_functions.php");
	$mysqli = db_connection();

if(!isset($_SESSION["admin_id"])) {
	$_SESSION["message"] = "You must login in first!";
	header("Location: index.php");
	exit;
}
if (($output = message()) !== null) {
	echo $output;
}

$_SESSION["username"]=null;
$_SESSION["admin_id"]=null;


 header("Location: index.php");
 exit;
