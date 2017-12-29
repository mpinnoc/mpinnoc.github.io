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
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
    
$ID = $_GET['ID'];


$sql = "UPDATE userinfo SET fname= '$fname', lname='$lname', email='$email' WHERE id='$ID'"; 

mysqli_query($conn, $sql);

//$id = mysqli_insert_id($conn);

//$conn->close();
}
header("Location: MyAccount");

?>