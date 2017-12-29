<?php
if(isset($_GET['ID']))
{
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "root";
	$dbname = "Test";

	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
		
	$ID = $_GET['ID'];
	
	$sql = "DELETE FROM Books WHERE id='$ID'"; 
	$query = mysqli_query($conn, $sql);

	$row = mysqli_fetch_array($query);


	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
    header('Location:  MyListings');
}
   




?>
