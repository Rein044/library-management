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
    function editBook(bookId) {
        window.location.href = "editbook.php?bookId=" + bookId;
    }

    function deleteBook(bookId) {
        var confirmDelete = confirm("Are you sure you want to delete this book?");
        if (confirmDelete) {
            
            $.ajax({
                url: 'deletebook.php', 
                method: 'POST',
                data: { bookId: bookId },
                success: function(response) {
                    
                    console.log(response);
                    
                    location.reload();
                },
                error: function(error) {
                    console.error("Error deleting book:", error);
                    
                }
            });
        }
    }

    function doneTyping() {
    var searchText = $('#search').val().toLowerCase();

    $('#bookTable tbody tr').each(function () {
        var rowText = $(this).text().toLowerCase();
        $(this).toggle(rowText.indexOf(searchText) > -1);
    });

    $('#bookTable p').remove(); 

    
    if ($('#bookTable tbody tr:visible').length === 0) {
        $('#bookTable tbody').append('<tr><td colspan="5">No matching records found.</td></tr>');
    }
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
    <h1>ADD BOOK</h1>
    <hr>
    <div class="mbook">
        <p>Edit Book</p>
        <?php
        include "toeditissue.php";
        ?>
        


        <form id="editissue" method="post" action="return.php">
        <div class="si">
        <p>Student Information</p>
        
        </div>
            <div class="issue1">
                <p><strong>Student ID:</strong><?php echo $studentInfo['SID']; ?></p>
            </div>

            <div class="issue3">
                <p><strong>Full Name:</strong> <?php echo $studentInfo['fullname']; ?></p>
            </div>

            <div class="issue4">
                <p><strong>Student Email:</strong> <?php echo $studentInfo['Email']; ?></p>
            </div>
            
            <div class="issue5">
                <p><strong>Contact Number:</strong> <?php echo $studentInfo['mobilenumber']; ?></p>
            </div>

            <div class="bi">
            <p>Book Information</p>
            </div>
            

            <div class="issue6">
                <p><strong>Book Image:</strong></p>
                <?php
               
                if (!empty($bookInfo['bookimg'])) {
                    
                    echo "<img src='uploads/{$bookInfo['bookimg']}' alt='Book Image' style='width: 150px; height: 200px;'>";
                } else {
                    
                    echo "<img src='uploads/placeholder_image.jpg' alt='Placeholder Image' style='width: 150px; height: 200px;'>";
                }
                ?>
            </div>

            <div class="issue7">
                <p><strong>Book Name:</strong> <?php echo $bookInfo['bookName']; ?></p>
            </div>

            <div class="issue8">
                <p><strong>ISBN:</strong> <?php echo $bookInfo['isbn']; ?></p>
            </div>

            <div class="issue9">
                <p><strong>Issue Date:</strong> <?php echo $issueInfo['issuedate']; ?></p>
            </div>

            <div class="issue10">
            <p><strong>Return Date:</strong>
                <?php
                if (!empty($issueInfo['returndate'])) {
                    echo $issueInfo['returndate'];
                } else {
                    echo "Not returned yet";
                }
            ?>

            <div class="issue11">
                
                <button type="submit" name="returnBook">Return Book</button>
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            </div>
            
            <input type="hidden" name="id" value="<?php echo $issueInfo['id']; ?>">
            
        </form>


</div>
</div>


        <footer>      
            <h1>© My System Online Library Management System</h1>
        </footer>
    

</body>
</html>
