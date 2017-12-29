<?php
    session_start();
    $servername = "localhost";
    $dbusername = "root";
	$dbpassword = "root";
	$dbname = "SignUp";

	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    $message="";
    if(!empty($_POST["username"])) {
        $sql= "SELECT * FROM userinfo WHERE username='" . $_POST["username"] . "' and password = '". $_POST["password"]."'";
        $query = mysqli_query($conn, $sql);
        $row  = mysqli_fetch_array($query);
        if(is_array($row)) {
        $_SESSION['ID'] = $row['id'];
        header("Location: Account");

        } else {
        $message = "Invalid Username or Password!";
        }
    }
    if($_SESSION['ID']!=NULL){
        header("Location: Account");          
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
                    Login
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

<div>
    <div class="content" style="padding:25px; display:block;margin:0px auto;text-align:left">
        <?php if(empty($_SESSION["ID"])) { ?>
        <form action="" method="post" >
            <label ><h2> Login</h2></label>
            
            <div style="color:red" class="error-message"><?php if(isset($message)) { echo $message; } ?></div>	
		      
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required="required" value=""/>
	          
            <h6></h6>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required="required" value=""/>
            
            <center style="line-height:10px;"> <input type="submit" class="button" name="submit" value="Login">
                        </center>             
        </form>
        <?php } else { 
        $result = mysqli_query($conn,"SELECT * FROM users WHERE id='" . $_SESSION["ID"] . "'");
        $row  = mysqli_fetch_array($result);
        ?>
    </div>
</div>
            <?php } ?>

        </div>
    </body>
</html>