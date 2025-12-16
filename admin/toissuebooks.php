<?php
include "../connet.php";

if (isset($_POST['isbnname'])) {
   
    if (isset($_POST['isbnname'])) {
        $isbnOrBookName = mysqli_real_escape_string($db, $_POST['isbnname']);
    
        if (!empty($isbnOrBookName)) {
            $query = "SELECT * FROM tbbooks WHERE isbn LIKE '%$isbnOrBookName%' OR bookName LIKE '%$isbnOrBookName%'";
            $result = mysqli_query($db, $query);
    
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $selectedBookId = $row['id'];
                }
            }
        }
    }
    
}

if (isset($_POST['submit'])) {
    if ($_POST['submit'] === 'add') {
        $studentId = mysqli_real_escape_string($db, $_POST['stid']);

        if (isset($selectedBookId) && !empty($selectedBookId)) {

            $checkDuplicateQuery = "SELECT * FROM issuebook WHERE bookid = '$selectedBookId' AND studentid = '$studentId'";
            $duplicateResult = mysqli_query($db, $checkDuplicateQuery);

            if ($duplicateResult && mysqli_num_rows($duplicateResult) > 0) {
                echo '<script type="text/javascript">alert("This book is already issued to the student.");</script>';
            } else {
                $insertQuery = "INSERT INTO issuebook (studentid, bookid) VALUES ('$studentId', '$selectedBookId')";
                $insertResult = mysqli_query($db, $insertQuery);

                if ($insertResult) {
                    echo '<script type="text/javascript">alert("Issued Successfully");  window.location.href = "administrator.php";</script>';
                } else {
                    echo '<script type="text/javascript">alert("Error issuing the book");</script>';
                }
            }
        } else {
            echo '<script type="text/javascript">alert("No book selected.");</script>';
        }
    } 
}
?>
