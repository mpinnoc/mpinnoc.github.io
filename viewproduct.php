<?php
session_start();
if(isset($_GET['ID']))
{
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "root";
	$dbname = "Test";

	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
		
	//$ID = mysqli_real_escape_string($conn ,$_GET['ID']);
	$ID = $_GET['ID'];

	
	$sql = "SELECT * 
		FROM Books WHERE id='$ID'"; 
	$query = mysqli_query($conn, $sql);

	$row = mysqli_fetch_array($query);

	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
	/*if(isset($_GET['post'])){

		$subject = mysqli_real_escape_string($_GET['subject']);
		$course = mysqli_real_escape_string($_GET['course']);
		$title = mysqli_real_escape_string($_GET['title']);
		$condition = mysqli_real_escape_string($_GET['condition']);
	}*/

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
        		.display {
        			position:relative; 
        			text-align:left; 
        			height: 400px; 
        			width:450px; 
        			font-size: 18px;
        			font-family: 'Oswald', sans-serif;
        			margin: auto; 
        		}
        		section { 
        			border:1px solid #cccccc; 
        			padding:5px; 
        			overflow:hidden; 
        			margin: 0; /*Can go*/
        			/*box-shadow: 0 0 0 1px #000;*/

        			
        		}
    			section > section { 
    				float:left; 
    			}
    			.indent-1 { 
    				padding-left:100px;
    				border:none;
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
                 <?php echo '<center><h1 style="font-size:32px">'.$row['title'].'</h1></center>' ?>
                <div class="container" style="height:80%"> 
                   
					<div class="container" style="border-right: 1px solid #dddddd; width:600px; height:400px; padding-top:20px; padding-left:40px;padding-right:40px;">
						<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="400" width="400" style="float:left; padding-left:150px; padding-right:40px;" class="img-thumnail" /></div>'?>
					
                    <div class="container" style="padding-left:40px;text-align:left;font-size:18px;">				
                    	<?php echo '<br>Subject: '.$row['subject'].'' ?>
                    	<?php echo '<br>Course: '.$row['course'].'' ?>
                    	<?php echo '<br>Condition: '.$row['conditions'].'' ?>
                    	<?php echo '<br>Description: '.$row['description'].'' ?>
                        <h3 style="position:absolute;font-size:18px;color:grey"> Price: $<?php echo $row['price'] ?> | Quanity: <?php echo $row['quantity'] ?>
                            <form action="<?php echo 'add.php?ID='.$row['id'].''?>" method="POST">
        				        <br><input type="submit" class="button" value="Add to Cart">
                            </form>
                        </h3>
        			</div>	
                        
    				</div>
    			</div>
            <br>
			<footer style="font-family:Oswald; position:static; bottom:0">
   				<small>&copy; 2018 RU CONNECTED? | Designed by Michelle Pinnock</small>
			</footer>
        </div>
    </body>	
</html>
  

