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
                width:26%;
                height: 100%;
            }
            #right{
                float:right;
                text-align:left;
                width:74%;
                overflow:hidden;
                background-color:white;
                /*border-left:2px solid black;*/
            }
            section { 
                padding:5px; 
                overflow:hidden; 
                margin: 0; 
                font-size:16px;
                text-align: left; 
            }
            section > section { 
                float:left;
                height: 280px;
                width: 250px;
            }
            .indent-1 { 
                border:none;
                border-bottom: 3px solid #f1f1f1;
            }
            .dets{
                font-size: 18px;
            }
       </style>
            </head>
    <body >
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
                            <div style="padding-left:70px">
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
                            $row  = mysqli_fetch_array($query);?>

                         <?php
                            session_start();
                            $servername = "localhost";
                            $dbusername = "root";
                            $dbpassword = "root";
                            $dbname = "Test";

                            $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

                            $ID= $_SESSION['ID'];

                            $sql= "SELECT * FROM Books WHERE sessionid='$ID'";
                            $query = mysqli_query($conn, $sql);
                           

                                if($query->num_rows==0)
                                    echo '<h1 style="text-align:center;color:grey">You have no lsitings posted at the moment.<br> To create a listing, simply click on the Sell button above.</h1>';
                                else{
                                    echo '<h2>Your Listings<br></h2>';
                                    while ($row = mysqli_fetch_array($query))
                                        {	
                                            echo '<section class="indent-1"><section><tr>
                                                    <td style="">Subject:<td>
                                                      <tr>'.$row['subject'].'</tr><br>
                                                    <td>Course:<td>									
                                                      <tr>'.$row['course'].'</tr><br>
                                                    <td>Title:<td>									
                                                      <tr>'.$row['title'].'</tr><br>
                                                    <td>Price:<td>									
                                                      <tr>$'.$row['price'].'</tr><br>
                                                    <td>Condition:<td>
                                                      <tr>'.$row['conditions'].'</tr><br>
                                                    <td>Description:<td>
                                                      <tr>'.$row['description'].'</tr><br></section>
                                                    <section>
                                                      <center><tr><img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="200" width="200" class="img-thumnail" /></center>  
                                                    </tr><br></section>
                                                      <section><tr><a style=" text-align:center;color:grey" href="edit.php?ID='.$row['id'].'"><i class="material-icons" >edit</i>Edit</a></tr>
                                                    </tr>
                                                    <br><tr><a style=" text-align:center;color:grey" href="Delete.php?ID='.$row['id'].'"><i class="material-icons" >clear</i>Delete</a></tr>
                                                    </section></section>';
                                        }
                                }
                            ?>
                            </div>
<footer style="font-family:Oswald;text-align:center">
    <small>&copy; 2018 RU CONNECTED? | Designed by Michelle Pinnock</small>
</footer>	
                        </div>
                </body>
        </div>
    </body>
</html>    







