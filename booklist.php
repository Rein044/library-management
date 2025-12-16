<?php
include "connet.php";

$query = "SELECT * FROM tbbooks";
$result = mysqli_query($db, $query);
$books = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
        

        // dropdown
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
                    $('#bookss').text(data + ' Books');
                },
                error: function () {
                    $('#bookss').text('Failed to fetch book count');
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
            <div class="dash">
                <p>BOOKS LISTED</p>
                <hr>
            </div>

<div class="hys">
    <div class="book-container">
        <?php
        foreach ($books as $book) {
            echo "<div class='book'>";
            echo "<img src='admin/uploads/{$book['bookimg']}' alt='Book Image'>";
            echo "<div class='book-info'>";
            echo "<p><strong>Title:</strong> {$book['bookName']}</p>";
            echo "<p><strong>Author:</strong> {$book['bookAuthors']}</p>";
            echo "<p><strong>Genre:</strong> {$book['bookCategory']}</p>";
            echo "<p><strong>ISBN:</strong> {$book['isbn']}</p>";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>
</div>




        </section>
        
        <footer>      
            <h1>© My System Online Library Management System</h1>
        </footer>
    </div>
</body>
</html>
