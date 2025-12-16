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
        $(document).ready(function() {
            $(".books-dropdown a").click(function(e) {
                e.preventDefault();
                $(".dropdown-content").not(".books-dropdown .dropdown-content").hide();
                $(".books-dropdown .dropdown-content").toggle();
            });

            $(".issue-books-dropdown a").click(function(e) {
                e.preventDefault();
                $(".dropdown-content").not(".issue-books-dropdown .dropdown-content").hide();
                $(".issue-books-dropdown .dropdown-content").toggle();
            });

            $(".authors-dropdown a").click(function(e) {
                e.preventDefault();
                $(".dropdown-content").not(".authors-dropdown .dropdown-content").hide();
                $(".authors-dropdown .dropdown-content").toggle();
            });

            $(".genre-dropdown a").click(function(e) {
                e.preventDefault();
                $(".dropdown-content").not(".genre-dropdown .dropdown-content").hide();
                $(".genre-dropdown .dropdown-content").toggle();
            });

            // Close dropdowns 
            $(document).on("click", function(event) {
                if (!$(event.target).closest(".dropdown").length) {
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
                success: function(data) {

                    $('#bookss').text(data);
                },
                error: function() {

                    $('#bookss').text('Failed to fetch book count');
                }
            });
        }
        updateBookissueCount();

        function updateBookissueCount() {
            $.ajax({
                url: 'countissue.php',
                method: 'GET',
                success: function(data) {

                    $('#issue').text(data);
                },
                error: function() {

                    $('#issue').text('Failed to fetch book count');
                }
            });
        }

        updateBookauthorCount();

        function updateBookauthorCount() {
            $.ajax({
                url: 'countauthor.php',
                method: 'GET',
                success: function(data) {

                    $('#author').text(data);
                },
                error: function() {

                    $('#author').text('Failed to fetch book count');
                }
            });
        }
        updateBookgenreCount();

        function updateBookgenreCount() {
            $.ajax({
                url: 'countgenre.php',
                method: 'GET',
                success: function(data) {

                    $('#gen').text(data);
                },
                error: function() {

                    $('#gen').text('Failed to fetch book count');
                }
            });
        }

        updateBookstudentCount();

        function updateBookstudentCount() {
            $.ajax({
                url: 'countstud.php',
                method: 'GET',
                success: function(data) {

                    $('#student').text(data);
                },
                error: function() {

                    $('#student').text('Failed to fetch book count');
                }
            });
        }
    </script>

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
                        <a href="#" onclick="redirectTo('addbooks1.php')">ADD BOOKS</a>
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
            <p>Admin Dashboard</p>
        </div>
        <div class="nasabox">
            <div class="square" onclick="location.href='mbooks.php';" style="cursor: pointer;">
                <h1>Listed Books</h1>
                <p id="bookss" style="margin-top: -70px; margin-left: 120px; font-size: 25px; font-weight: bold; color: orange;"></p>
                <img src="../pics/bo.png" alt="">
            </div>
            <div class="square1" onclick="location.href='missue.php';" style="cursor: pointer;">
                <h1>Books Not Returned Yet</h1>
                <p id="issue" style="margin-top: -70px; margin-left: 120px; font-size: 25px; font-weight: bold; color: rgb(131, 190, 253);"></p>
                <img src="../pics/is.png" alt="">
            </div>
            <div class="square2" onclick="location.href='mautors.php';" style="cursor: pointer;">
                <h1>Authors</h1>
                <p id="author" style="margin-top: -70px; margin-left: 120px; font-size: 25px; font-weight: bold; color: green;"></p>
                <img src="../pics/au.png" alt="">
            </div>
            <div class="square3" onclick="location.href='mgenre.php';" style="cursor: pointer;">
                <h1>Genre</h1>
                <p id="gen" style="margin-top: -70px; margin-left: 120px; font-size: 25px; font-weight: bold; color: #B2533E;"></p>
                <img src="../pics/li.png" alt="">
            </div>
            <div class="square4" onclick="location.href='reg.php';" style="cursor: pointer;">
                <h1>Registered Students</h1>
                <p id="student" style="margin-top: -70px; margin-left: 115px; font-size: 25px; font-weight: bold; color: violet;"></p>
                <img src="../pics/ge.png" alt="">
            </div>
        </div>


    </div>


    <footer>
        <h1>© My System Online Library Management System</h1>
    </footer>


</body>

</html>