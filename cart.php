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
            Shopping Cart 
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
        </style>
         <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script src="https://www.paypalobjects.com/api/checkout.js"></script>
            
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
                    <div class="container" > 
					   <div id="left" style="padding:40px; border-right: thick solid white;">
                            <div>
                            <?php
                            if($_SESSION['cart']==NULL){
                                echo '<h1>YOUR SHOPPING CART IS EMPTY</h1>';
                                echo '<a href="Buy" style="color:grey"><< Continue Shopping</a>';  
                            }
                            else{
                                echo '<a style="color:grey;position:absolute;right:42%" href="empty.php">Empty Cart</a>';                               
                            }
                            ?>   
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
                                            <tr><img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="200" width="200" class="img-thumnail" 
                                            style="float:left; padding-right:50px"/></tr><br>
                                            <h2>'.$row['title'].'</h2>
                                            <h3>$'.$row['price'].'</h3>
                                            <h3>'.$row['conditions'].'</h3>
                                            <h3 style="line-height:20px;">Description: '.$row['description'].'</h3>
                                            <a style="float:right;color:grey" href="remove.php?ID='.$row['id'].'"><i class="material-icons">clear</i></a>
                                        </tr></section>';
                                    $item_total += ($row['price']);
                            }
                            ?>
                            </div>
    				    </div>
                        <div id="right">
                            <table style="border-bottom: 1px solid grey;margin:1em auto;">
                                <tr>
                                    <td><h3>Need Help? Contact Us at contact@ruconnected.me</h3></td>
                                </tr>
                            </table>
                            <table style="border-bottom: 1px solid grey;margin-left:50px;">
                                <tr>
                                    <td><h2 style="line-height:10px;">Subtotal: $<?php echo $item_total ?></h2></td>
                                </tr>
                                <tr>
                                    <td><h2 style="line-height:10px;">Estimated Tax: $  -</h2></td>
                                </tr>
                            </table>
                            <h2 style="text-indent:50px">Estimated Total: $<?php echo $item_total ?></h2>
                            
                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post">

                              <!-- Identify your business so that you can collect the payments. -->
                              <input type="hidden" name="business" value="michelle.pinnock@ruconnected.me">

                              <!-- Specify a Buy Now button. -->
                              <input type="hidden" name="cmd" value="_xclick">

                              <!-- Specify details about the item that buyers will purchase. -->
                              <input type="hidden" name="item_name" value="<?php echo $row['title']?>">
                              <input type="hidden" name="amount" value="<?php echo $item_total ?>">
                              <input type="hidden" name="currency_code" value="USD">

                              <!-- Display the payment button. -->
                                <input type="submit" name="submit" class="button" value="PROCEED TO CHECKOUT" style="width:309">
                                
                          
                              <img alt="" border="0" width="1" height="1"
                              src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

                        </form>
                            
                            
                            <br>
                            <br><img alt="Credit Card Logos" title="Credit Card Logos" src="https://www.3dcart.com/images/credit-card-logos/cc-md-4.png" width="309" height="38" border="0" /></a>   
                            <br>-or-<br>
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post">

                              <!-- Identify your business so that you can collect the payments. -->
                              <input type="hidden" name="business" value="michelle.pinnock@ruconnected.me">

                              <!-- Specify a Buy Now button. -->
                              <input type="hidden" name="cmd" value="_xclick">

                              <!-- Specify details about the item that buyers will purchase. -->
                              <input type="hidden" name="item_name" value="<?php echo $row['title']?>">
                              <input type="hidden" name="amount" value="<?php echo $item_total ?>">
                              <input type="hidden" name="currency_code" value="USD">

                              <!-- Display the payment button. -->
                              <input type="image" name="submit" border="0" width="300" height="40"
                              src="https://www.ralphlauren.com/on/demandware.static/Sites-RalphLauren_US-Site/-/default/dw3cb246ec/images/PayPal.svg"
                              alt="Buy Now">
                              <img alt="" border="0" width="1" height="1"
                              src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

                        </form>
                            <br>
                                <a href="Buy" style="color:grey">Continue Shopping</a>
                        </div>
                </body>
        </div>
    </body>
</html>    
<footer style="font-family:Oswald; position:static; bottom:zero">
   				<small>&copy; 2018 RU CONNECTED? | Designed by Michelle Pinnock</small>
			</footer>	
