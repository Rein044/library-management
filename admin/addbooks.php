<!DOCTYPE html>
<html lang="en">
<head>
    <title>Library Management System</title>
    <link rel="stylesheet" type="text/css" href="../extend/style.css">   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
    <script>
        function logout() {
            window.location.href = "../index.php";
        }

      
        //dropdown
        $(document).ready(function(){
    $(".books-dropdown a").click(function(e){
        e.preventDefault();
        $(".dropdown-content").not(".books-dropdown .dropdown-content").hide();
        $(".books-dropdown .dropdown-content").toggle();
    });

    $(".issue-books-dropdown a").click(function(e){
        e.preventDefault();
        $(".dropdown-content").not(".issue-books-dropdown .dropdown-content").hide();
        $(".issue-books-dropdown .dropdown-content").toggle();
    });

    $(".authors-dropdown a").click(function(e){
        e.preventDefault();
        $(".dropdown-content").not(".authors-dropdown .dropdown-content").hide();
        $(".authors-dropdown .dropdown-content").toggle();
    });

    $(".genre-dropdown a").click(function(e){
        e.preventDefault();
        $(".dropdown-content").not(".genre-dropdown .dropdown-content").hide();
        $(".genre-dropdown .dropdown-content").toggle();
    });

    // Close dropdowns 
    $(document).on("click", function(event){
        if(!$(event.target).closest(".dropdown").length){
            $(".dropdown-content").hide();
        }
    });
});


function redirectTo(url) {
    window.location.href = "addbooks.php";
}
function redirectTo1(url) {
    window.location.href = "mbooks.php";
}
function redirectTo2(url) {
    window.location.href = "addissue.php";
}
function redirectTo3(url) {
    window.location.href = "missue.php";
}
function redirectTo4(url) {
    window.location.href = "addauthors.php";
}
function redirectTo5(url) {
    window.location.href = "mautors.php";
}
function redirectTo6(url) {
    window.location.href = "addgenre.php";
}
function redirectTo7(url) {
    window.location.href = "mgenre.php";
}

//books

updateBookCount();
                function updateBookCount() {
                    $.ajax({
                        url: '../book.php', 
                        method: 'GET',
                        success: function (data) {
                        
                            $('#bookss').text(data);
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
            
                <a href="administrator.php"> 
                    <img src="../pics/logo.png" class="img" alt="Logo">
                </a>
                <div class="bb">
                    <button type="button" onclick="logout()">LOG OUT</button>
                </div>
            </div>
        </div>
            
                <header>
                    <nav class="n">
                        <ul>
                            <li><a href="administrator.php">DASHBOARD</a></li>
                            <li class="dropdown books-dropdown">
                                <a href="#">BOOKS▾</a>
                                <div class="dropdown-content">
                                    <a href="#" onclick="redirectTo('addbooks.php')">ADD BOOKS</a>
                                    <a href="#" onclick="redirectTo1('mbooks.php')">MANAGE BOOKS</a>
                                </div>
                            </li>

                            <li class="dropdown issue-books-dropdown">
                                <a href="#">ISSUE BOOKS▾</a>
                                <div class="dropdown-content">
                                    <a href="#" onclick="redirectTo2('addissue.php')">ADD ISSUE BOOKS</a>
                                    <a href="#" onclick="redirectTo3('missue.php')">MANAGE ISSUE BOOKS</a>
                                </div>
                            </li>
                            <li class="dropdown authors-dropdown">
                                <a href="#">AUTHORS▾</a>
                                <div class="dropdown-content">
                                    <a href="#" onclick="redirectTo4('addauthors.php')">ADD AUTHORS</a>
                                    <a href="#" onclick="redirectTo5('mauthors.php')">MANAGE AUTHORS</a>
                                </div>
                            </li>
                            <li class="dropdown genre-dropdown">
                                <a href="#">GENRE▾</a>
                                <div class="dropdown-content">
                                    <a href="#" onclick="redirectTo6('addgenre.php')">ADD GENRE</a>
                                    <a href="#" onclick="redirectTo7('mgenre.php')">MANAGE GENRE</a>
                                </div>
                            </li>
                                <li><a href="reg.php">REGISTERED STUDENTS</a></li>
                            
                        </ul>
                    </nav>
                    
                </header>
            
            <div class="section2">
            <div class="dashboard-box">
                <p>ADD BOOK</p>
            </div>
                    <div class=addbooks>
                        <h1>Book Info</h1>
                        <div class="bgtop"></div>
                        <form name="adding" action="" method="post" enctype="multipart/form-data">
                            <div class="add1">
                                <label for="bookName">Book Name:</label><br>
                                <input class="in1" type="text" name="bookName" placeholder="Book Name" required>
                                <?php
                                include "tobooks.php";
                                ?>
                            </div>
                            <div class="add2">
                                <label for="author">Author:</label><br>

                                <?php
                                include "../connet.php";
                                $s = mysqli_query($db, "SELECT * FROM tbautor");
                                ?>

                                <select class="in1" name="bookAuthors">
                                    <option value="" disabled required selected>Select Author</option>
                                    <?php
                                    while ($r = mysqli_fetch_array($s)) {
                                    ?>
                                        <option value="<?php echo $r['authorname']; ?>"><?php echo $r['authorname']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="add3">
                                <label for="category">Genre:</label><br>
                                <?php
                                include "../connet.php";
                                $s = mysqli_query($db, "SELECT * FROM tbgenre");
                                ?>

                                <select class="in1" name="bookCategory">
                                    <option value="" disabled selected required>Select Genre</option>
                                    <?php
                                    while ($r = mysqli_fetch_array($s)) {
                                    ?>
                                        <option value="<?php echo $r['genrename']; ?>"><?php echo $r['genrename']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="add4">
                                <label for="isbn">ISBN:</label><br>
                                <input class="in1" type="text" name="isbn" placeholder="ISBN" required>
                                <h>An ISBN is an International Standard Book Number.ISBN Must be unique</h>
                            </div>
                            
                            <div class="add5">
                                <label for="bookimg">Book Image:</label><br>
                                <input class="in1" type="file" name="bookimg" accept="image/*" required>
                            </div>

                            <button class="addbtn" type="submit" name="submit" value="add">ADD</button>

                        </form>

                    </div>                   
            </div>
       
        
        <footer>      
            <h1>© My System Online Library Management System</h1>
        </footer>
    

</body>
</html>
