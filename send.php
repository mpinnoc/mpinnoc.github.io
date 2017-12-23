<?php
   
    if(!isset($_POST['submit']))
        {
            echo "error you need to submit your form";
        }
    
    $name = $_POST['name'];
    $cell = $_POST)['cell'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    if(empty($name)|| empty($email) || empty($message))
    {
        echo "Name and email are required.";
        exit;
    }
    
    $from = "$email"
    $subject = "Hello! New Form Submission"
    $body = "Your contact form has been submitted by: \nName: $name \nCell: $cell \nE-mail: $email \nMessage: \n$messgae \nEnd of Message";
    
    $to = 'contact@ruconnected.me';
    $headers = "From: $email "
    mail($to, $subject, $body $headers);
    
    ?>

