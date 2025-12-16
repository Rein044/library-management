<?php
include "changepass.php";
include "connet.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Library Management System</title>
    <link rel="stylesheet" type="text/css" href="extend/style.css">    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
    <script>
    function logout() {
        window.location.href = "index.php";
    }
    function redirectTohehe(url) {
    window.location.href = "myprofile.php";
}
function redirectTohehee(url) {
    window.location.href = "changepassword.php";
}

    //dropdown
    $(document).ready(function(){
        $(".dropdown a").click(function(e){
            e.preventDefault();
            $(".dropdown-content").toggle();
        });
    });


    function changePassword(event) {
        event.preventDefault();

        $("#errorMessages").empty();
   
        var currentPassword = $("#currentPassword").val();
        var newPassword = $("#newPassword").val();
        var confirmPassword = $("#confirmPassword").val();

        if (newPassword.length < 8) {
            $("#errorMessages").html("New password must be at least 8 characters long.");
            return; 
        }

        $.ajax({
            type: "POST",
            url: "changepass.php",
            data: {
                currentPassword: currentPassword,
                newPassword: newPassword,
                confirmPassword: confirmPassword
            },
            success: function(response) {
                
                $("#errorMessages").html(response);
            },
            error: function() {
                $("#errorMessages").html("Error in AJAX request.");
            }
        });
    }
</script>
</head>

<body>
    <div class="wrapper">
        <div class="header2">
            
            <a href="dashboard.php"> 
                <img src="pics/logo.png" class="img" alt="Logo">
            </a>
            <div class="b">
                <button type="button" onclick="logout()">LOG OUT</button>
            </div>
        </div>
        
        <header>
            <nav class="n">
                <ul>
                    <li><a href="dashboard.php">DASHBOARD</a></li>
                    <li><a href="bookissue.php">ISSUED BOOKS</a></li>
                    <li class="dropdown">
                        <a href="#">ACCOUNT▾</a>
                        <div class="dropdown-content">
                        <a href="#" onclick="redirectTohehe('myprofile.php')">MY PROFILE</a>
                        <a href="#" onclick="redirectTohehee('changepassword.php')">CHANGE PASSWORD</a>
                        </div>
                    </li>
                </ul>
            </nav>
            
        </header>
        
        <section>
        <div class="dashboard-box">
                <p>CHANGE PASSWORD</p>
            </div>
            <div class="ch">
            <p style="margin-left:10px; margin-top: 10px;">CHANGE PASSWORD</p>
            <form id="changePasswordForm" onsubmit="changePassword(event)">
            
            <label for="currentPassword" style="margin-left:20px;">Current Password:</label><br>
            <input type="password" id="currentPassword" name="currentPassword" style="margin-left:20px; width: 610px; height: 30px;" required><br>

            <label for="newPassword" style="margin-left:20px;">New Password:</label><br>
            <input type="password" id="newPassword" name="newPassword" style="margin-left:20px; width: 610px; height: 30px;" required><br>

            <label for="confirmPassword" style="margin-left:20px;">Confirm New Password:</label><br>
            <input type="password" id="confirmPassword" name="confirmPassword" style="margin-left:20px; width: 610px; height: 30px;" required><br>

            <div id="errorMessages" style="margin-left:20px; margin-top: 5px; COLOR: red;"></div>

            <button type="submit" name="change" style="margin-left:20px; margin-top: 10px; margin-bottom: 10px;">Change</button>

            
        </form>
    </div>

            
        </section>
        <footer>      
            <h1>© My System Online Library Management System</h1>
        </footer>
    </div>

</body>
</html>
