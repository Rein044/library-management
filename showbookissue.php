<?php
include "connet.php";
session_start();

if (isset($_SESSION['usersid'])) {
    $userSid = $_SESSION['usersid'];

    $query = "SELECT tbbooks.bookName, tbbooks.bookAuthors, issuebook.issuedate, issuebook.returndate
              FROM issuebook
              JOIN tbbooks ON issuebook.bookid = tbbooks.id
              WHERE issuebook.studentid = '$userSid'";
    
    $result = mysqli_query($db, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {

            
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td style='text-align: left;'>"; echo $row['bookName']; echo "</td>";
                echo "<td style='text-align: left;'>"; echo $row['bookAuthors']; echo "</td>";
                echo "<td style='text-align: left;'>"; echo $row['issuedate']; echo "</td>";
                echo "<td style='text-align: left;'>";
                
                if (empty($row['returndate'])) {
                    echo "<span style='color: red;'>Not Yet Returned</span>";
                } else {
                    echo $row['returndate'];
                }
                
                echo "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No issued books found for the specified student ID.</p>";
        }
    } else {
        echo "<p>Error fetching issued books: " . mysqli_error($db) . "</p>";
    }
} else {
    echo "<p>User not logged in.</p>";
}

mysqli_close($db);
?>

