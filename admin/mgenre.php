<!DOCTYPE html>
<html lang="en">
   <head>
   <link rel="stylesheet" type="text/css" href="../extend/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
      <script>
         function logout() {
             window.location.href = "../index.php";
         }
         
         
         //dropdown
         $(document).ready(function(){

            
            $('#bookTable').DataTable();


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
         
         function editGenre(id) {
         window.location.href = "editgenre.php?id=" + id;
         }
         
         function deleteGenre(id) {
    var confirmDelete = confirm("Are you sure you want to delete this genre?");
    if (confirmDelete) {
        $.ajax({
            url: 'deletegenre.php',
            method: 'POST',
            data: { deleteGenreID: id }, 
            success: function (response) {
                console.log(response);
                location.reload();
            },
            error: function (error) {
                console.error("Error deleting genre:", error);
            }
        });
    }
}

         
         $(document).ready(function() {
        
        var table = $('#bookTable').DataTable();

        function doneTyping() {
            var searchText = $('#search').val().toLowerCase();

            
            table.search(searchText).draw();

            
            if (table.page.info().recordsDisplay === 0) {
               
                $('#bookTable p').remove();
                
                $('#bookTable').append('<p><br><br>No matching records found.</p>');
            } else {
                
                $('#bookTable p').remove();
            }
        }
    })
    
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
                <p>MANAGE GENRE</p>
            </div>
         <div class="mbook">
            <p style="margin-top: -30px; margin-left: 10px;">Book lists</p>
            <table class='table table-bordered table-hover' style='margin-left: 50px; width: 1000px; margin-top: 15px; border-radius: 10px;' id='bookTable'>
               <thead>
                  <tr style='background-color: black; color: white;'>
                     <th>#</th>
                     <th>Genre</th>
                     <th>Creation Date</th>
                     <th>Updation Date</th>
                     <th>Edit</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     include "tomgenre.php";
                     ?>
               </tbody>
            </table>
        </div>
         </div>
      </div>
      </div>         
      </div>
      <footer>
         <h1>© My System Online Library Management System</h1>
      </footer>
   </body>
</html>