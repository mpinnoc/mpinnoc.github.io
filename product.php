<?php

$servername = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "Test";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$subject = $_POST['subject'];
$course = $_POST['course'];
$title = $_POST['title'];
$condition = $_POST['condition'];


$sql = "INSERT INTO product (ID, subject, course, title, conditions, file)
VALUES ('', '$subject', '$course', '$title', '$condition', '')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
   
    
?>