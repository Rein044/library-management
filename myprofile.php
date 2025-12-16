<?php
include "showprofile.php";
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

    $(document).ready(function(){
        $(".dropdown a").click(function(e){
            e.preventDefault();
            $(".dropdown-content").toggle();
        });
    });

    // for books
    updateBookCount();
    function updateBookCount() {
        $.ajax({
            url: 'book.php', 
            method: 'GET',
            success: function (data) {
                $('#bookss').text(data);
            },
            error: function () {
                $('#bookss').text('Failed to fetch book count');
            }
        });

        
        $.ajax({
            url: 'countbookissue.php', 
            method: 'GET',
            success: function (data) {
                $('#count').text(data);
            },
            error: function () {
                $('#count').text('Failed to fetch the count of books not returned');
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
                <p>MY PROFILE</p>
            </div>
            <div class="profile">
                <p style="margin-top: 10px; margin-left: 20px;">My Profile</p>
                <form method="post">
                <div style="display: flex; align-items: center;">
                    <p style="margin-top: 30px; margin-left: 20px; font-size: 15px; font-weight: bold;">Student ID:</p>
                    <p style="margin-top: 30px; margin-left: 10px;"><?php echo $studentId; ?></p>
                </div>
                <div style="display: flex; align-items: center;">
                    <p style="margin-top: 20px; margin-left: 20px; font-size: 15px; font-weight: bold;">Registration Date:</p>
                    <p style="margin-top: 20px; margin-left: 10px;"><?php echo $reg; ?></p>
                </div>
                <label for="newfullname" style="margin-left:22px; font-weight: bold; font-size: 16px;">Full Name:</label><br>
                <input type="text" id="newfullname" name="newfullname" value="<?php echo $studentName; ?>" style="width: 850px;; margin-left: 22px; padding: 5px; border: 1px solid #ccc;"><br>
                
                <label for="newmobilenumber" style="margin-left:22px; font-weight: bold; font-size: 16px;">Mobile Number:</label><br>
                <input type="text" id="newmobilenumber" name="newmobilenumber" value="<?php echo $num; ?>" style="width: 850px;; margin-left: 22px; padding: 5px; border: 1px solid #ccc;"><br>
                
                <label for="Em" style="margin-left:22px; font-weight: bold; font-size: 16px;">Email:</label><br>
                <input type="email" id="myemail" name="myemail" value="<?php echo $email; ?>" disabled style="width: 850px;; margin-left: 22px; padding: 5px; border: 1px solid #ccc;"><br><br> 

                <button type="submit" name="update" style="margin-left:22px;">Update</button>
                </form>
                
            </div>
        </section>
        <footer>      
            <h1>© My System Online Library Management System</h1>
        </footer>
    </div>
</body>
</html>
