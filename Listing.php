<?php
    session_start();
    if($_SESSION['ID']==NULL){
         header("Location: Login");                       
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Lato|Oswald:300" rel="stylesheet">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                <link href="main.css" rel="stylesheet" type="text/css" />
                <link href="contact.css" rel="stylesheet" type="text/css" />
                <title>
                    Post Listing
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
            
                		<button onClick="window.location.href='Account'"><i class="material-icons">person</i>Account &#x2630;</button>
                            <ul class="dmenu">               
                   	        <?php
                                session_start();
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
            <body style="background:white">
                
                <div class="content" style="padding:25px; text-align:left">
                    <form action= "Listings.php" enctype="multipart/form-data" method="POST">
                      
                    <label ><h2> Product Listing</h2></label>
                    
                    <label for="subject">Subject:</label>
                    <input type="text" id="subject" name="subject" value="" required="required"/>
                    
                    <label for="course">Course Number:</label>
                    <input type="text" id="course" name="course" value="" required="required"/>
                    
                    <label for="title">Book Title:</label>
                    <input type="text" id="title" name="title" value="" required="required"/>
                        
                    <label for="price">Price:</label>
                    <br><span>$<input min="0" step=".01" type="number" id="price" name="price" value="" required="required"/></span><br>
                    
                	<label>Condition:</label>
                    	<select for="condition" id="condition" name="condition" value="">
    						<option id="New" name="New" value="New">New</option>
    						<option id="Like New" name="Like New" value="Like New">Like New</option>
    						<option id="Very Good "name="Very Good" value="Very Good">Very Good</option>
    						<option id="Good" name="Good" value="Good">Good</option>
    						<option id="Acceptable" name="Acceptable" value="Acceptable">Acceptable</option>
  						</select>
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" value="" ></textarea>

    					Select image to upload:
    					<input type="file" name="fileToUpload" id="fileToUpload" value="">
    					<input id="upload" type="submit" value="Upload Image" name="submit">
                    <br><br><br>
                   		<center style="line-height:10px;"> 
                    		<input type="submit" class="button" name="submit" value="Submit">
                        </center>
                    </form>
                </div>
            </body>
        </div>
    </body>
</html>

<footer style="font-family:Oswald">
    <small>&copy; 2018 RU CONNECTED? | Designed by Michelle Pinnock</small>
</footer>


