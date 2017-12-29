<?php
session_start();
if(isset($_GET['ID'])){
$servername = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "SignUp";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$username = $_POST['username'];
$password = $_POST['password'];
    
$ID = $_GET['ID'];


$sql = "UPDATE userinfo SET username= '$username', password='$password' WHERE id='$ID'"; 

mysqli_query($conn, $sql);

//$id = mysqli_insert_id($conn);

//$conn->close();
}
header("Location: MyAccount.php");

?>