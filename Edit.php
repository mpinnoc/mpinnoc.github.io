<?php
if(isset($_GET['ID']))
{
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "root";
	$dbname = "Test";

	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
		
	$ID = $_GET['ID'];
	
	$sql = "SELECT * 
		FROM Books WHERE id='$ID'"; 
	$query = mysqli_query($conn, $sql);

	$row = mysqli_fetch_array($query);

	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
	
}
else
{
	header('Loaction:  display.php');
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
            Textbooks
        </title>
        	 <style>
        		input[type=text], input[type=email], input[type=password], select, tel
                {
                    width: 100%;
                    padding: 15px;
                    border-bottom: 2px solid black;
                    border-left: 2px solid #F9F8F8;
                    border-right: 2px solid #F9F8F8;
                    border-top: 2px solid #F9F8F8;
                    border-radius: 4px;
                    box-sizing: border-box;
                    margin-top: 6px;
                    margin-bottom: 16px;
                    background-color:white;

                }

                input[type=number]{
                    width: 50%;
                    padding: 15px;
                    border-bottom: 2px solid black;
                    border-left: 2px solid #F9F8F8;
                    border-right: 2px solid #F9F8F8;
                    border-top: 2px solid #F9F8F8;
                    border-radius: 4px;
                    box-sizing: border-box;
                    margin-top: 6px;
                    margin-bottom: 16px;
                    background-color:white;
                }
                textarea
                {

                    border-bottom: 2px solid black;
                    border-left: 2px solid #F9F8F8;
                    border-right: 2px solid #F9F8F8;
                    border-top: 2px solid #F9F8F8;
                    background-color:white;
                    border-radius: 4px;
                    overflow: auto;
                    height:25%;
                    width: 100%;
                    box-sizing: border-box;
                    margin-bottom: 16px;
                    resize: vertical;
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
                <div class="content" style="text-align:left"> 
                <form action= <?php echo'"Update?ID='.$row['id'].'"'?> enctype="multipart/form-data" method="POST">
    
                    <?php echo '<label for="subject">Subject: </label><input type=text id="subject" name="subject"  value="'.$row['subject'].'"><br>' ?>
                	<?php echo '<label for="course">Course: </label><input type=text id="course" name="course" value="'.$row['course'].'"><br>' ?>
                     <?php echo '<label for="title">Title: </label><input type=text id="title" name="title"  value="'.$row['title'].'"><br>' ?>
                    <?php echo '<label for="price">Price: $</label><input type=number id="price" step=".01" name="price"  value="'.$row['price'].'"><br>' ?>
                	<?php echo '<label>Condition:</label>
                    	<select for="condition" id="condition" name="condition" value="'.$row['conditions'].'">
    						<option id="New" name="New" value="New">New</option>
    						<option id="Like New" name="Like New" value="Like New">Like New</option>
    						<option id="Very Good "name="Very Good" value="Very Good">Very Good</option>
    						<option id="Good" name="Good" value="Good">Good</option>
    						<option id="Acceptable" name="Acceptable" value="Acceptable">Acceptable</option>
  						</select>' ?>
                	<?php echo '<label for="price">Description: </label><textarea id="description" name="description" value="">  '.$row['description'].'</textarea><br>' ?>
                    <?php echo 'Select image to upload:
    					<input type="file" name="fileToUpload" id="fileToUpload" value="">
    					<input id="upload" type="submit" value="Upload Image" name="submit"> 
                        <img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="200" width="200"  class="img-thumnail" /> '?>
			         <br><center><input type="submit" class="button" name="submit" value="Submit">
</center>
                    
                </form>
    			</div>
        </div>
    </body>	
</html>

<footer style="font-family:Oswald; position:static; bottom:0">
   				<small>&copy; 2018 RU CONNECTED? | Designed by Michelle Pinnock</small>
			</footer>
