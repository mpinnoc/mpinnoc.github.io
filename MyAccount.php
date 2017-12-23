<?php
    session_start();
    $servername = "localhost";
    $dbusername = "root";
	$dbpassword = "root";
	$dbname = "SignUp";

	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    $ID= $_SESSION['ID'];

    $sql= "SELECT * FROM userinfo WHERE id='$ID'";
    $query = mysqli_query($conn, $sql);
    $row  = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Lato|Oswald:300" rel="stylesheet">
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                    <link href="main.css" rel="stylesheet" type="text/css" />
                    <link href="contact.css" rel="stylesheet" type="text/css" />

        <title>
            Account
        </title>
        <style> 
            #left{
                float:left;
                width:25%;
                height: 100%;
            }
            #right{
                float:right;
                text-align:left;
                width:75%;
                overflow:hidden;
                background-color:white;
                border-left:2px solid black;
            }
            section { 
                border:1px solid #cccccc; 
                padding:5px; 
        		overflow:hidden; 
                width:750px;
        		margin: 0; /*Can go*/
        			/*box-shadow: 0 0 0 1px #000;*/
        		}
            section > section { 
                float:left;
                width:350px;
                height: 450px;
    			}
            .indent-1 { 
                padding-left:100px;
                border:none;
            }
            .dets{
                font-size: 18px;
            }
       </style>
            </head>
    <body style="background-color:#f1f1f1">
        <div>
            <table id="myTable">
                <tr>
                    <td>
                        <div style="float:left;" class="dropdown2">
                        <button class="button" style="padding: 8px 4px;font-size:18px">&#x2630;</button>
                        <ul class="dmenu" style="width:225px;background-color:#CCCCCC;">
                            <form action= "Search.php" method="POST">
                                <li><input style="border-color:#CCCCCC" name="search" class="search" type="class" placeholder="Search..."/>
                                    <input class="material-icons" style="background-color:#CCCCCC;float:right;padding: 10px 4px" type="submit" value="search"/>
                                </li>
                            </form>
                            <li><a onClick="window.location.href='Home.html'">Home</a></li>
                            <li><a onClick="window.location.href='Mission.html'">Mission</a></li>
                            <li><a onClick="window.location.href='Contact.html'">Contact</a></li>
                            <li><a onClick="window.location.href='Buy.html'">Buy</a></li>                            
                            <li><a onClick="window.location.href='Sell.html'">Sell</a></li>
                            <li><a onClick="window.location.href='Cart.php'">Cart</a></li>

                                </ul>
                        </div>
                        
                        <form action= "Search.php" method="POST">
                        <input id="view" style="float:left;" name="search" class="search" type="class" placeholder="Search..."/>
                		<button id="view" name="submit" type="submit" class="button" style="float:left;padding: 8px 4px"><i class="material-icons">search</i></button>
		               	</form>
		                <button id="view" onClick="window.location.href='cart.php'" class="button" style="float:left;padding: 8px 4px"><i class="material-icons">&#xE8CC;</i></button>

                        <div style="float:right;" class="dropdown">
            
                		<button onClick="window.location.href='Account.php'"><i class="material-icons">person</i>Account &#x2630;</button>
                            <ul class="dmenu">               
                   	        <?php
                                if($_SESSION['ID']==NULL){
                                    echo '<li><a onClick="window.location.href=\'Registration.php\'" href="#">Create Account</a></li>';               echo '<li><a onClick="window.location.href=\'Login.php" href="#">Login</a></li>';
                                }
                                else{
                                    echo '<li><a onClick="window.location.href=\'MyListings.php\'" href="#">My Listings</a></li>';
                                    echo '<li><a onClick="window.location.href=\'Logout.php\'" href="#">Logout</a></li>';
                            }?> 
                            </ul>
            			</div>
                        
                        <img class="img2" src="logo3.png"/>
                        <h6></h6>
                        <table id="bot">
                            <ul class="dmenu">
                            <a onClick="window.location.href='Home.html'" class="button">Home</a>
                            <a onClick="window.location.href='Mission.html'" class="button">Mission</a>
                            <a onClick="window.location.href='Contact.html'" class="button">Contact</a>
                            <a onClick="window.location.href='Buy.html'" class="button">Buy</a>
                            <a onClick="window.location.href='Sell.html'" class="button">Sell</a>
                                </ul>
                        </table>
                    </td>
                </tr>
            </table>
                    <body  style="font-family:'Oswald';">
                    <div> 
					   <div id="left" style="">
                            <ul class= "info">
                	<li>
                        <?php
                            session_start();
                            $servername = "localhost";
                            $dbusername = "root";
                            $dbpassword = "root";
                            $dbname = "SignUp";

                            $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

                            $ID= $_SESSION['ID'];

                            $sql= "SELECT * FROM userinfo WHERE id='$ID'";
                            $query = mysqli_query($conn, $sql);
                            $row  = mysqli_fetch_array($query); 
                            $date = new DateTime($row['created_at']);
                            echo '<h2 style="text-align:center"> '.$row['fname'].' '.$row['lname'].'</h2>'; 
                            echo '<h3 style="text-align:center"> Member Since: '.$date->format('m-d-Y').'</h3>';
                        ?>
                    </li>
                    <a>Rutgers Newark</a>
                    <br><a>Status: Other</a><br>

                	<li><?php echo '<a href="MyAccount.php" style="color:grey">Personal Data</a>'; ?></li>
                    <li><a href="MyListings.php" style="color:grey">Listings</a></li>
                    <li><a href="MyOrders.php" style="color:grey">Orders</a></li>
                    <li><a href="logout.php" style="color:grey">Logout</a></li>
                    <li></li>
                    
                </ul>
                            </div>
    				    </div>
                        <div id="right">
                            <h1 style=" margin-top:0px;text-align:center">Change Personal Information</h1>
                        <div style="text-align:left;padding-right:75px;font-size:18px;padding-left:70px">  
                        <form action= <?php echo'"NameEmail.php?ID='.$row['id'].'"'?> method="POST">

                            <?php
                            
                                echo '<h2 style="color:grey">Change Name/Email</h2>
                                <label for="fname">First Name: <span class="required">*</span></label><input type=text id="fname" name="fname"  value="'.$row['fname'].'" required="required"/><br> 
                                <label for="lname">Last Name: <span class="required">*</span></label><input type=text id="lname" name="lname"  value="'.$row['lname'].'" required="required"/><br>
                                <label for="email">Email: <span class="required">*</span></label><input type=text id="email" name="email"  value="'.$row['email'].'" required="required"/><br>'; 
                            ?>
                            <center><input style="border-radius:4px;" type="submit" class="button" name="submit" value="Save"></center>
                        </form>
                        <form action= <?php echo'"UsernamePassword.php?ID='.$row['id'].'"'?> method="POST">

                            <?php

                                echo '<h2 style="color:grey">Change Username/Password</h2>
                                <label for="username">Username: <span class="required">*</span></label><input type=text id="username" name="username"  value="'.$row['username'].'" required="required"/><br>
                                <label for="password">Password: <span class="required">*</span></label><input type=password id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number, one uppercase and lowercase letter, and at least 8 or more characters" value="'.$row['password'].'" required="required"/><br>
                                <label for="repassword">Confirm Password: <span class="required">*</span></label><input type="password" id="repassword" name="repassword" required="required"/>'; 
                            ?>
                            <center><input style="border-radius:4px;" type="submit" class="button" name="submit" value="Save"></center>
                        </form>
                            <script>
                                var password = document.getElementById("password")
                                  , repassword = document.getElementById("repassword");

                                function validatePassword(){
                                  if(password.value != repassword.value) {
                                    repassword.setCustomValidity("Passwords Don't Match");
                                  } else {
                                    repassword.setCustomValidity('');
                                  }
                                }

                                password.onchange = validatePassword;
                                repassword.onkeyup = validatePassword;
                            </script>
<footer style="font-family:Oswald;text-align:center">
    <small>&copy; 2018 RU CONNECTED? | Designed by Michelle Pinnock</small>
</footer>	
                        </div>
                        </div>
                </body>
        </div>
    </body>
</html>    

