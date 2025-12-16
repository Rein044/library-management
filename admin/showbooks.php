<?php
include "../connet.php";

if (isset($_POST['isbnname'])) {
    $isbnOrBookName = mysqli_real_escape_string($db, $_POST['isbnname']);

    
    if (!empty($isbnOrBookName)) {
        $query = "SELECT * FROM tbbooks WHERE isbn LIKE '%$isbnOrBookName%' OR bookName LIKE '%$isbnOrBookName%'";
        $result = mysqli_query($db, $query);

        if ($result && mysqli_num_rows($result) > 0) {
           
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='search-result'>";
                echo "<img src='uploads/{$row['bookimg']}' alt='Book Image' style='margin-top: 20px; margin-left: 20px; height: 250px; width: 170px;'>";
                echo "<p style='margin-top: 20px; margin-left: 20px;'>Book Name: {$row['bookName']}</p>";
                echo "<p style='margin-left: 20px;'>Book Author: {$row['bookAuthors']}</p>";               
                echo "</div>";

                $selectedBookId = $row['id'];
            }
        } else {
            echo "<p style='margin-top: 10px; margin-left: 20px; color: red;'>No books found.</p>";
        }
    } 
} 
?>
