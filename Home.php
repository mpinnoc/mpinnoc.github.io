<!DOCTYPE html>
<html>
    
    <head>
        <link href="https://fonts.googleapis.com/css?family=Lato|Oswald:300" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:700" rel="stylesheet">
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                    <link href="main.css" rel="stylesheet" type="text/css" />
                <title>
                    RU CONNECTED?
                </title>
                </head>
    <body>
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
                            <li><a onClick="window.location.href='Contact.php'">Contact</a></li>
                            <li><a onClick="window.location.href='Buy.php'">Buy</a></li>                            <li><a onClick="window.location.href='Sell.php'">Sell</a></li>
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
            <img class= "effect" src="Rutgers.png" alt="Rutgers" style="width:100%;height:610px" />
    </body>
</html>



