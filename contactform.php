<?php
session_start();
    if(isset($_POST['email'])){
		
        $email = $_POST['email'];
		
       // $subject= 'Contact Form - '.new Date();
	    $subject= 'Contact Form - '.date("Y-m-d H:i:s");
        $message= 'Name: '.$_POST['name']."\r\n\r\n";
        $message .= 'Email: '.$_POST['email']."\r\n\r\n";
       // $email = filter_input(INPUT_POST, $email, FILTER_VALIDATE_EMAIL);
		
      //  if($email){
			
			 $from ="ruconnected.me\r\n";
		    $headers= "From:".$from;
            //$headers .= "\r\nReply-To:$email";
			$headers .= "Reply-To:".$email."\r\n"."X-Mailer: PHP/". phpversion();
       //}
		

        $message .= 'Comments: '.$_POST['message'];
       
       // $headers.= 'Content-Type: text/plain; charset=utf-8';
        //$sucess =
		 if(@mail($email, $subject, $message, $headers))
		 {
		 $_SESSION["success"] = True;
		 
		 }
		 header("Location: Confirmation"); /* Redirect browser */
		 exit();
    }
	

    ?>