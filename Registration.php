<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Lato|Oswald:300" rel="stylesheet">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                <link href="main.css" rel="stylesheet" type="text/css" />
                <link href="contact.css" rel="stylesheet" type="text/css" />
                <title>
                    Registration
                </title>
                 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                    <script type="text/javascript">
                        function checkusername(){
                            var name = document.getElementById("username").value;
                            if(name){
                                $.ajax({
                                    type:'post',
                                    url: 'check.php',
                                    data:{
                                        user_name:name,
                                    },
                                success: function(response){
                                    $('#usernamestatus').html(response);
                                }

                                });
                            }
                            else{
                                $('#usernamestatus').html("");
                                return false;
                            }  
                        }
                        
                        function checkemail(){
                            var email = document.getElementById("email").value;
                            if(email){
                                $.ajax({
                                    type:'post',
                                    url: 'check.php',
                                    data:{
                                        user_email:email,
                                    },
                                success: function(response){
                                    $('#emailstatus').html(response);
                                }

                                });
                            }
                            else{
                                $('#emailstatus').html("");
                                return false;
                            }  
                        }
                    </script>
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
            <body>              
                <div class="content" style="padding:25px;text-align:left">
                    <form action= "signup.php" method="POST">
                     
                    <label ><h2> Create an Account</h2></label>
                    
                    <label for="fname"> First Name: <span class="required">*</span></label>
                    <input type="text" id="fname" name="fname" required="required"/>
                    
                    <label for="lname"> Last Name: <span class="required">*</span></label>
                    <input type="text" id="lname" name="lname" required="required"/>
                        
                    <label for="email"> E-Mail: <span class="required">*</span></label>
                    <input type="email" id="email" name="email" required="required" onkeyup="checkemail();"/>
                    <span id="emailstatus"></span>    
                     
                    <label for="username"> Username: <span class="required">*</span></label>
                    <input type="text" id="username" name="username" value="" required="required" onkeyup="checkusername();"/>
                    <span id="usernamestatus"></span>
                        
                    <label for="password">Password: <span class="required">*</span></label>
                    <input type="password" id="password" name="password" value="" required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number, one uppercase and lowercase letter, and at least 8 or more characters"/>
                        
                    <label for="repassword">Confirm Password: <span class="required">*</span></label>
                    <input type="password" id="repassword" name="repassword" required="required"/>
                        
                	<span class="required">*</span> These fields are required<br>
                    <center>
                        <input type="submit" class="button" name="submit" value="Submit">
                        </center>
                    </form>
                    <script>
                    var password = document.getElementById("password")
                      , repassword = document.getElementById("repassword");

                    function validatePassword(){
                      if(password.value != repassword.value) {
                        repassword.setCustomValidity("Passwords Don't Match");
                      } else {
                        repassword.setCustomValidity('');
                      }
                    }

                    password.onchange = validatePassword;
                    repassword.onkeyup = validatePassword;
                    </script>
                </div>
            </body>
        </div>
    </body>
</html>

<footer style="font-family:Oswald; position:static; bottom:0; text-align:center">
    <small>&copy; 2018 RU CONNECTED? | Designed by Michelle Pinnock</small>
</footer>