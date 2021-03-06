<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Lato|Oswald:300" rel="stylesheet">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                <link href="main.css" rel="stylesheet" type="text/css" />
                    <link href="contact.css" rel="stylesheet" type="text/css" />
            <title>
                Contact Us
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
                            <li><a onClick="window.location.href='Contact.php'">Contact</a></li>
                            <li><a onClick="window.location.href='Buy.php'">Buy</a></li>                            
                            <li><a onClick="window.location.href='Sell.php'">Sell</a></li>
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
            <body style="background:white;height:100%">

        <div class="container" style="padding:25px">
            	<form action= "contactform.php" method="POST">
               
                <label style="padding-top:40px"><h2> Contact Form</h2></label>

                <label for="name"> Your Full Name: <span class="required">*</span></label>
                <input type="text" id="name" name="name" placeholder="John Smith" required="required"/>
                
                <label for="cell">Cell Number:</label><br />
                <input type="text" id="cell" name="cell" placeholder="1(800)-222-3333">
                        
                <label for="email">Email Address: <span class="required">*</span></label>
                <input type="email" id="email" name="email" placeholder="JohnSmith@example.com" required="required"/>
      
                <label for="message">Message: <span class="required">*</span>
                <textarea id="message" name="message" placeholder="Enter your message or query..." required="required"></textarea></label>

                
                <body style="line-height:normal;" id="required"><span class="required">*</span> These fields are required</body>
                <center style="line-height:10px;"> <input type="submit" class="button" name="submit" value="Submit Form">
                </center>
            </form>
            <div>
                <iframe style="padding:15px;right:5px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d377.12902117695194!2d-74.17601849489604!3d40.7371830319799!2m3!1f0!2f39.37469812961927!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x89c2537e41ee6b09%3A0x47c5c35500021b0d!2sRutgers+University+-+Newark+Campus!5e1!3m2!1sen!2sus!4v1508516839228" width="650" height="658" frameborder="0"allowfullscreen></iframe>
            </div>
        </div>
    </body>
</div>
    </body>
</html>

<footer style="font-family:Oswald; position:static; bottom:0; text-align:center">
    <small>&copy; 2018 RU CONNECTED? | Designed by Michelle Pinnock</small>
</footer>
