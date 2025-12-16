<!DOCTYPE html>
<html lang="en">
<head>
    <title>Library Management System</title>
    <link rel="stylesheet" type="text/css" href="extend/style.css">    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"> <!-- Add DataTable CSS -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script> <!-- Replace the existing jQuery link -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script> <!-- Add DataTable JS -->
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

        // dropdown
        $(document).ready(function(){
            $(".dropdown a").click(function(e){
                e.preventDefault();
                $(".dropdown-content").toggle();
            });
        });

        $(document).ready(function () {
            
            var table = $('#bookTable').DataTable();

            var typingTimer;
            var doneTypingInterval = 500; 

            $('#searchInput').on('input', function () {
                clearTimeout(typingTimer);
                typingTimer = setTimeout(doneTyping, doneTypingInterval);
            });

            function doneTyping() {
                var searchText = $('#searchInput').val().toLowerCase();

                table.search(searchText).draw(); 

                $('#bookTable p').remove(); 

                
                if ($('#bookTable tbody tr:visible').length === 0) {
                    $('#bookTable').append('<p>No matching records found.</p>');
                }
            }
        });
    </script>
</head>
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
                <p>MANAGE ISSUE BOOKS</p>
                <hr style="border: 1px solid grey; margin: 0 auto; width: 1300px;">

            </div>
            <div class="isb">

            <table class='table table-bordered table-hover' style='margin-left:50px; width: 1210px; margin-top: 15px;' id='bookTable'>
            <thead>
                <tr style='background-color: black; color: white;'>
                    <th>Book Name</th>
                    <th>Book Author</th>
                    <th>Issue Date</th>
                    <th>Return Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                   include "showbookissue.php";
                ?>
            </tbody>
            </table>
    
                               
            </div>
        </section>
        <footer>      
            <h1>© My System Online Library Management System</h1>
        </footer>
    </div>
</body>
</html>
