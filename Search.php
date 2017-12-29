<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = 'root'; // Password
$db_name = 'Test'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

$search = $_POST['search'];

//echo "$search";

$sql = "SELECT * 
		FROM Books WHERE quantity=1 AND subject LIKE '%".$search."%' OR course LIKE '%".$search."%' OR title LIKE '%".$search."%'";
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
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
            Search
        </title>
        	 <style>
        		display {
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
                    width:350px;
                    height: 450px;
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
               <body  style="font-family:'Oswald';">
    	<h6></h6>
		<center style="line-height:20px;">Textbooks</center>
		<h6></h6>                    
			<img class="buy"  src="Textbooks.jpg" width=900 height=300/>			
		<h2></h2>
	
		<section class="indent-1">		
			<?php
                if($query->num_rows==0)
                    echo '<h1 style="text-align:center;color:grey">Oops! Something Went Wrong.<br>Please try searching something else.</h1>';
                else{
                    while ($row = mysqli_fetch_array($query))
                    {								
                        echo '<section><tr>
                                <td style="">Subject:<td>
                                    <tr>'.$row['subject'].'</tr><br>
                                <td>Course:<td>									
                                    <tr>'.$row['course'].'</tr><br>
                                <td>Title:<td>									
                                    <tr>'.$row['title'].'</tr><br>
                                <td>Condition:<td>
                                    <tr>'.$row['conditions'].'</tr><br>
                                <td><td><br>
                                    <tr><img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="200" width="200" class="img-thumnail" /></tr><br>
                                <tr><a class="button" href="viewproduct?ID='.$row['id'].'">View Product</a></tr><br>						
                            <br></tr></section>';
                    }
                }
            ?>
		</section>
			<footer style="font-family:Oswald; position:static; bottom:zero">
    			<small>&copy; 2018 RU CONNECTED? | Designed by Michelle Pinnock</small>
			</footer>	
			</body>		
        
        </div>
        
    </body>
    
</html>

