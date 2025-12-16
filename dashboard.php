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
                <p>USER DASHBOARD</p>
            </div>
            <div class="nanaman">
           <div class="gb">
                <div class="boxx" onclick="location.href='booklist.php';" style="cursor: pointer;">
                    <h1>Listed Books</h1>
                    <p id="bookss"></p>
                    <img src="pics/l.png" alt="">
                </div>
                <div class="boxx1">
                    <h1>Books Not Returned Yet</h1>
                    <p id="count"></p>
                    <img src="pics/is.png" alt="">
                </div>
                
                <div class="boxx2" onclick="location.href='bookissue.php';" style="cursor: pointer;">
                    <h1>Issued Books</h1>
                    <img src="pics/hehe.png" alt="">
                </div>
            </div>
            </div>
        </section>
        <footer>      
            <h1>© My System Online Library Management System</h1>
        </footer>
    </div>

</body>
</html>
