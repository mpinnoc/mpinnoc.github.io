<?php
session_start();
    $servername = "localhost";
	$dbusername = "root";
	$dbpassword = "root";
	$dbname = "Test";

	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
		
	//$ID = mysqli_real_escape_string($conn ,$_GET['ID']);
	$ID = $_GET['ID'];

	$sql = "SELECT * 
		FROM Books WHERE id='$ID'"; 
	$query = mysqli_query($conn, $sql);

	$row = mysqli_fetch_array($query);
	header("Location: cart.php");

	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 

if(empty($_SESSION['cart'])){
  
$_SESSION['cart'] = array();                     
}
array_push($_SESSION['cart'], $_GET['ID'] );



?>
