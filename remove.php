<?php
session_start();
if(isset($_GET['ID'])){
    $servername = "localhost";
	$dbusername = "root";
	$dbpassword = "root";
	$dbname = "Test";

	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
		
	$ID = $_GET['ID'];
    $key = array_search($ID, $_SESSION['cart'] );

	unset($_SESSION['cart'][$key] );

	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 

	header("Location: cart.php");
}  
?>
