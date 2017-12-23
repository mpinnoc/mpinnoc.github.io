<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Lato|Oswald:300" rel="stylesheet">
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                    <link href="main.css" rel="stylesheet" type="text/css" />
        <title>
            Sell
        </title>
            </head>
    <body>
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
                            <li><a onClick="window.location.href='Home.php'">Home</a></li>
                            <li><a onClick="window.location.href='Mission.php'">Mission</a></li>
                            <li><a onClick="window.location.href='Contact.php'">Buy</a></li>
                            <li><a onClick="window.location.href='Contact.php'">Contact</a></li>
                            <li><a onClick="window.location.href='Buy.php'">Buy</a></li>                            
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
                            session_start();
                                if($_SESSION['ID']==NULL){
                                    echo '<li><a onClick="window.location.href=\'Registration.php\'" href="#">Create Account</a></li>';               echo '<li><a onClick="window.location.href=\'Login.php\'" href="#">Login</a></li>';
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
                            <a onClick="window.location.href='Home.php'" class="button">Home</a>
                            <a onClick="window.location.href='Mission.php'" class="button">Mission</a>
                            <a onClick="window.location.href='Contact.php'" class="button">Contact</a>
                            <a onClick="window.location.href='Buy.php'" class="button">Buy</a>
                            <a onClick="window.location.href='Sell.php'" class="button">Sell</a>
                                </ul>
                        </table>
                    </td>
                </tr>
            </table>
            <div class="content" style="background-color:transparent">

                <h1 style="text-align:center;padding-top:80px">Sell</h1>
            	<p  style="text-align:center; font-weight:bold" > 
            	<br>Turn your textbooks into cash. Connect with other students and sell.</br>
            	<br> This selling tool makes it easy and fast for listing your items
            
            	<form>
            	<br><br><br><br><br><br>
                	<input onClick="window.location.href='Listing.php'" type="button" class="button" value="Create a Product Listing">
                </form>
                </p>                
                <img style="opacity:0.6; position: absolute;left: 0px;top: 50px; z-index:-1;width:100%;min-height:100%" src="books.jpg"/>

            </div>
            	<footer style="font-family:Oswald;">
    				<small>&copy; 2018 RU CONNECTED? | Designed by Michelle Pinnock</small>
				</footer>
        </div>
        
    </body>
    
</html>

