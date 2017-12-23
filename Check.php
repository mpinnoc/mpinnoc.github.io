<?php
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "root";
    $dbname = "SignUp";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);


    if(isset($_POST['user_name'])){
        $username = $_POST['user_name'];
        
        $sql ="SELECT * FROM userinfo WHERE username= '$username'";
            
        $query = mysqli_query($conn, $sql);
        
    if($row = mysqli_fetch_array($query))
       {
        echo '<h3 style="color:red;text-align:center;font-size:16px">Sorry that username is already taken<h3>';
       }
       /*else
       {
        echo '<h3 style="color:green;text-align:center;font-size:16px;">Username Available</h3>';
       }*/
    exit();
    }

    if(isset($_POST['user_email'])){
        $email = $_POST['user_email'];
        
        $sql ="SELECT * FROM userinfo WHERE email= '$email'";
            
        $query = mysqli_query($conn, $sql);
        
    if($row = mysqli_fetch_array($query))
       {
        echo '<h3 style="color:red;text-align:center;font-size:16px;padding:none">It looks like there is an account with this email already<h3><h2 style="color:grey;text-align:center;font-size:16px;">If you believe this is a mistake, please contact us at contact@ruconnected.me</h2>';
       }
       /*else
       {
        echo '<h3 style="color:green;text-align:center;padding:none">Username Available</h3>';
       }*/
    exit();
    }
?>