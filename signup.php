<?php
include "connet.php";
include "submit.php";
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
    <style>

        input[type="checkbox"] {
            width: 15px;
            height: 15px; 
            margin-top: -3px;
            margin-left: 10px;
        }

        label.show-password-label {
            margin-left: 1px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class= "header2">
            <a href="index.php"> 
                <img src="pics/logo.png">
            </a>
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
        

        <div class="section1">
           
            <div class="signup">
                <img src="pics/c.png" alt="" width="100" height="100" style="margin-left: 280px;"> 
                <img src="pics/i.png" alt="" width="100" height="100" style="margin-right: 50px;">                           
                <h3 class="tt" style="margin-left: 10px; margin-top: 30px; font-size: 25px;">Create Account</h3>
                <form name="sign" action="" method="post" onsubmit="return validateForm()">
                    <div class="cont">
                        <label for="fullname">Full Name:</label><br>
                        <input type="text" id="fullname" name="fullname" required>
                    </div>
                    <div class="cont">
                        <label for="mobilenumber">Mobile Number:</label><br>
                        <input class="control" type="tel" id="mobilenumber" name="mobilenumber" required>
                    </div>
                    <div class="cont">
                        <label for="email">Email:</label><br>
                        <input class="form-control1" type="email" id="email" name="email" required>
                    </div>
                    <form onsubmit="return validateForm(event);">
                    <div class="cont">
                        <label for="password">Password:</label><br>
                        <input class="control" type="password" id="password" name="password" required>
                        <input type="checkbox" id="checkboxPassword" onclick="myFunction('checkboxPassword', 'password')">
                        <label class="show-password-label" for="checkboxPassword">Show Password</label>
                    </div>

                    <div class="cont">
                        <label for="confirmpassword">Confirm Password:</label><br>
                        <input class="control" type="password" id="cpassword" name="confirmpassword" required>
                        <input type="checkbox" id="checkboxConfirmPassword" onclick="myFunction1('checkboxConfirmPassword', 'confirmpassword')">
                        <label class="show-password-label" for="checkboxConfirmPassword">Show Password</label>
                    </div>
                    <div class="but">
                        <input type="hidden" name="submit" value="1">
                        <button type="submit" class="but">SIGN UP</button>
                    </div>
                    <script>
                        function myFunction() {
                            var x = document.getElementById("password");
                        if (x.type === "password") {
                            x.type = "text";
                        } else {
                            x.type = "password";
                            }
                        }
                    
                        function myFunction1() {
                            var x = document.getElementById("cpassword");
                        if (x.type === "password") {
                            x.type = "text";
                        } else {
                            x.type = "password";
                            }
                        }
                    
                        function validateForm() {
                            var password = document.getElementById("password").value;
                            var confirmPassword = document.getElementById("cpassword").value;

                           
                            if (password !== confirmPassword) {
                                alert("Passwords do not match");
                                return false;
                            }

                          
                            if (password.length < 8) {
                                alert("Password must be at least 8 characters");
                                return false;
                            }

                         
                            return true;
                        }
                    </script>
                </form>
            </div> 
</div>
        <footer>
          <h1>© My System Online Library Management System</h1>
        </footer>
    </div>


</body>
</html>