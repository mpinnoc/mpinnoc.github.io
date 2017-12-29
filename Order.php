<?php
session_start();
    $servername = "localhost";
	$dbusername = "root";
	$dbpassword = "root";
	$dbname = "Test";

	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    $whereIn= implode(',',$_SESSION['cart']);

	$sql = "SELECT * 
		FROM Books WHERE id IN($whereIn)";

 
	$query = mysqli_query($conn, $sql);

	$row = mysqli_fetch_array($query);

	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
	

?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Lato|Oswald:300" rel="stylesheet">
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                    <link href="main.css" rel="stylesheet" type="text/css" />
        <title>
            Order Details 
        </title>
        <style>
            #left{
                float:left;
                width:60%;
                height: 100%;
            }
            #right{
                float:left;
                width:40%;
                overflow:hidden;
                text-align:center;
            } 
            h3{
                color:dimgray;
                line-height:10px;
            }
            section { 
        			border-bottom:2px solid #cccccc; 
        			padding:5px; 
        			overflow:hidden; 
        			margin: 0; /*Can go*/
        			/*box-shadow: 0 0 0 1px #000;*/
	
            }
            section > section { 
    				float:left; 
            }
            h3{
                text-align: left;
            }
        </style>
            </head>
    <body>
        <div>
            <table id="myTable">
                <tr>
                    <td>
                        <div style="float:left;" class="dropdown2">
                        <button class="button" style="padding: 8px 4px;font-size:18px">&#x2630;</button>
                        <ul class="dmenu" style="width:225px;background-color:#CCCCCC;">
                            <form action= "Search" method="POST">
                                <li><input style="border-color:#CCCCCC" name="search" class="search" type="class" placeholder="Search..."/>
                                    <input class="material-icons" style="background-color:#CCCCCC;float:right;padding: 10px 4px" type="submit" value="search"/>
                                </li>
                            </form>
                            <li><a onClick="window.location.href='Home'">Home</a></li>
                            <li><a onClick="window.location.href='Mission'">Mission</a></li>
                            <li><a onClick="window.location.href='Contact'">Contact</a></li>
                            <li><a onClick="window.location.href='Buy'">Buy</a></li>                            <li><a onClick="window.location.href='Sell'">Sell</a></li>
                            <li><a onClick="window.location.href='Cart'">Cart</a></li>

                                </ul>
                        </div>
                        
                        <form action= "Search" method="POST">
                        <input id="view" style="float:left;" name="search" class="search" type="class" placeholder="Search..."/>
                		<button id="view" name="submit" type="submit" class="button" style="float:left;padding: 8px 4px"><i class="material-icons">search</i></button>
		               	</form>
		               	<button id="view" onClick="window.location.href='cart.php'" class="button" style="float:left;padding: 8px 4px"><i class="material-icons">&#xE8CC;</i></button>

                        <div style="float:right;" class="dropdown">
                            
                		<button  onClick="window.location.href='Account'"><i class="material-icons">person</i>Account &#x2630;</button>
                            <ul class="dmenu">               
                   	        <?php
                                if($_SESSION['ID']==NULL){
                                    echo '<li><a onClick="window.location.href=\'Registration\'" href="#">Create Account</a></li>';               echo '<li><a onClick="window.location.href=\'Login\'" href="#">Login</a></li>';
                                }
                                else{
                                    echo '<li><a onClick="window.location.href=\'MyListings\'" href="#">My Listings</a></li>';
                                    echo '<li><a onClick="window.location.href=\'Logout.php\'" href="#">Logout</a></li>';
                            }?> 
                            </ul>
            			</div>
                        
                        <img class="img2" src="logo3.png"/>
                        <h6></h6>
                        <table id="bot">
                            <ul class="dmenu">
                            <a onClick="window.location.href='Home'" class="button">Home</a>
                            <a onClick="window.location.href='Mission'" class="button">Mission</a>
                            <a onClick="window.location.href='Contact'" class="button">Contact</a>
                            <a onClick="window.location.href='Buy'" class="button">Buy</a>
                            <a onClick="window.location.href='Sell'" class="button">Sell</a>
                                </ul>
                        </table>
                    </td>
                </tr>
            </table>
                <body  style="font-family:'Oswald';">
                    <div class="content" > 
                        <h4 style="font-size:40px;letter-spacing: 2px;font-weight:normal; padding:none;"> Thanks!</h4>
                        <h3 style="text-align:center;"> Your order has successfuly been placed. You'll find all the details about your order below and </h3><h3 style="text-align:center;"> you will be receiving an email shortly with more details.</h3>
                        <h3 style="text-align:center;padding-bottom :30px">If you have any questions or concerns, feel free to contact us at contact@ruconnected.me</h3>
                        <h2 style="text-align:center;"> Order Details</h2>
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
                                
                                $OrderNumber= rand(000000000,999999999);

                                echo '<h3>Order #: '.$OrderNumber.'<h3>';

                                echo '<h3 style="color:black;">'.$row['fname'].' '.$row['lname'].'</h3>';
                                $now = new DateTime();
                                echo '<h3 style="color:black;">Order Date: '.$now->format('m-d-Y g:i a').'</h3>'; 
    
                                
                            ?>
                            <h2 style="text-align:left;font-size:18px;padding-top:10px;">Item(s)</h2>
                            <?php
                                while (list($key, $val)=each($_SESSION['cart'])){ 
                                    $servername = "localhost";
                                    $dbusername = "root";
                                    $dbpassword = "root";
                                    $dbname = "Test";

                                    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

                                    $sql = "SELECT * 
                                        FROM Books WHERE id='$val'";

                                    $query = mysqli_query($conn, $sql);

                                    $row = mysqli_fetch_array($query);
                                    echo '<section>
                                            <tr><img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="100" width="100" class="img-thumnail" 
                                            style="float:left; padding-right:50px"/></tr>
                                            <h2>'.$row['title'].'</h2>
                                            <h3>$'.$row['price'].'</h3>
                                            <h3>'.$row['conditions'].'</h3>
                                            <h3 style="line-height:20px;">Description: '.$row['description'].'</h3>
                                        </tr></section>';
                                    $item_total += ($row['price']);
                                    
                                    $sql= "UPDATE Books SET quantity= '0' WHERE id='$val'";
                                    $query = mysqli_query($conn, $sql);
                                    
                                    $id= $row['id'];                       
                                $subject = $row['subject'];
                                $course = $row['course'];
                                $title = $row['title'];
                                $price = $row['price'];
                                $condition = $row['conditions'];
                                $description = $row['description'];
                                $buyer = $_SESSION['ID'];
                                $seller = $row['sessionid'];
                                $file = $row['name'];                        

                                $sql = "INSERT INTO Orders (ID, subject, course, title, price, conditions, description, buyerid, sellerid, created_at, ordernumber)
                                VALUES ('$id', '$subject', '$course', '$title', '$price', '$condition','$description', '$buyer','$seller', CURRENT_TIMESTAMP, '$OrderNumber')";

                                mysqli_query($conn, $sql);

                                    
                            }
                                echo '<h2 style="text-align:right;font-size:20px;padding-bottom:10px;">Subtotal: $'.$item_total.'</h2>';
                                echo '<h2 style="text-align:right;font-size:20px;">Tax: $ - </h2>';
                                echo '<table style="float:right; padding:none;"><tr><td style="background-color:grey;float:right;padding:none;"><h2 style="text-align:right;font-size:20px;">Total Price: $'.$item_total.'</h2></td></tr></table>';
                            ?>
                                              
                        <?php
                            session_start();
                            $_SESSION['cart'] = array();
                        ?>
                            </div>
                    
                </body>
            </div>   
        </body>
    <div><br></div><br>
    
</html>    
<footer style="font-family:Oswald; position:static; bottom:zero">
   				<small>&copy; 2018 RU CONNECTED? | Designed by Michelle Pinnock</small>
			</footer>	
