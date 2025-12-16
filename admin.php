<?php
include "connet.php";
include "adminlog.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Library Management System
    </title>
    <link rel= "stylesheet" type="text/css" href="extend/style.css">    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class= "header2">
            <a href="index.php"> 
            <img src="pics/logo.png" class="img" alt="Logo">

        </div>
        <header>
                <nav>
                    <ul>
                        <li><a href="index.php">HOME</a></li>
                        <li><a href="signup.php">USER SIGNUP </a></li>
                        <li><a href="admin.php">ADMIN LOGIN</a></li>
                    </ul>
                </nav>
        </header>
        

        <section>
            <div class="login-rectangle2">
		        <div class="texttext">
   		            LOGIN AS ADMIN
    	        </div>
	        </div>

                <div class="box">
                <img src="pics/c.png" alt="" width="100" height="100" style="margin-left: 140px; margin-top: 20px;"> 
                <img src="pics/i.png" alt="" width="100" height="100" style="margin-right: 60px; margin-top: 20px;">  
                 <h1>ADMIN LOGIN FORM</h1>
                 <form name="admin" action="" method="post">
                <div class="group">
                    <label for="email">Email:</label><br>
                    <input class="form-control" type="text" name="email" placeholder="Email" required=""> 
                </div>
                
                <div class="group-pass">
                    <label for="pass">Password:</label><br>
                    <input class="form-control" type="password" name="pass" id="pass" placeholder="Password" required="">
                    <input type="checkbox" onclick="myFunction()" style="height: 15px; margin-left:-211px; margin-top: 15px;">
                    <h1 style="margin-left: 33px; margin-top: -15px; font-size: 15px;">Show Password</h1>
                </div>

                <button class="btn" type="submit" name="admin" value="login">Login</button>
                <p class="tx">Not registered yet? <a href="signup.php">Register now</a></p>
                </form>
                </div>
                <script>
    function myFunction() {
        console.log("Toggle password visibility");
        var x = document.getElementById("pass");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

                
        </section>

        <footer>      
                <h1>© My System Online Library Management System</h1>
        </footer>
    </div>
</body>
</html>