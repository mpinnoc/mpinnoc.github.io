<?php
session_start();
$servername = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "Test";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$subject = $_POST['subject'];
$course = $_POST['course'];
$title = $_POST['title'];
$price = $_POST['price'];
$condition = $_POST['condition'];
$description = $_POST['description'];

$file = addslashes(file_get_contents($_FILES["fileToUpload"]["tmp_name"]));  
 
$SESSIONID= $_SESSION['ID'];

$sql = "INSERT INTO Books (ID, subject, course, title, price, conditions, description, name, sessionid, quantity)
VALUES ('', '$subject', '$course', '$title', '$price', '$condition','$description', '$file','$SESSIONID','1')";

mysqli_query($conn, $sql);

$id = mysqli_insert_id($conn);

$conn->close();

?>

<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "Test";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$subject = $_POST['subject'];
$course = $_POST['course'];
$title = $_POST['title'];
$price = $_POST['price'];
$condition = $_POST['condition'];
$description = $_POST['description'];

$sql = "SELECT * 
		FROM Books WHERE id='$id'"; 
		
$query = mysqli_query($conn, $sql);


?>

<html>
 <head>
        <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Lato|Oswald:300" rel="stylesheet">
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                    <link href="main.css" rel="stylesheet" type="text/css" />
                    <link href="contact.css" rel="stylesheet" type="text/css" />

        <title>
            Listing 
        </title>
        <style>
        	.display{
        	position:relative; 
        	text-align:left; 
        	height: 400px; 
        	width:450px; 
        	font-size: 18px;
        	font-family: 'Oswald', sans-serif;
        	margin: auto; 
        	}
        	.button{    
        	border-radius:4px;
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
		               	<button id="view" class="button" style="float:left;padding: 8px 4px"><i class="material-icons">&#xE8CC;</i></button>

                        <div style="float:right;" class="dropdown">
            
                		<button  onClick="window.location.href='Account.php'"><i class="material-icons">person</i>Account &#x2630;</button>
                            <ul class="dmenu">               
                   	        <?php
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
            	<h1 style="text-align:center; font-size:30px;font-family: 'Oswald', sans-serif;"> 
            	Please Confirm that the Information Below is Correct </h1>
                    <div class="display">
					 <label ><h2> Product Listing</h2></label>
						<?php
							while ($row = mysqli_fetch_array($query))
							{								
								echo '<tr>
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
									<tr>'.$row['description'].'</tr><br>
								<td>Image:<td><br>
									<center><tr><img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="200" width="200" class="img-thumnail" /></center>  
                                </tr>
                                <div style="text-align:center"><tr><a class="button" style=" text-align:center" href="edit.php?ID='.$row['id'].'">Edit</a></tr>
									</tr>';
							}?>                    
                        
					<input style= "display:inline-block; text-align:center" onClick="window.location.href='Buy.php'" type="button" class="button" value="Continue">
					</div>
				</div>
    </div>
</body>
</html>