<?php

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
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "INSERT INTO userinfo (ID, fname, lname, email, username, password, created_at )
	VALUES ('', '$fname', '$lname', '$email','$username', '$password', CURRENT_TIMESTAMP)";

	if ($conn->query($sql) === TRUE) {
    	//echo "New record created successfully";
    	header("Location: Thanx"); /* Redirect browser */

	} else {
   	 	echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
	
	///// 
	
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

	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "INSERT INTO users (ID, username, password)
	VALUES ('', '$username', '$password')";

	if ($conn->query($sql) === TRUE) {
    	echo "New record created successfully";
	} else {
   	 	echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
	
	
	
?>