<?php
include "../connet.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["returnBook"])) {
   
    $studentid = isset($_POST["studentid"]) ? mysqli_real_escape_string($db, $_POST["studentid"]) : '';
    $bookid = isset($_POST["bookid"]) ? mysqli_real_escape_string($db, $_POST["bookid"]) : '';
    $id = isset($_POST["id"]) ? mysqli_real_escape_string($db, $_POST["id"]) : '';

    $issueUpdateQuery = "UPDATE issuebook SET returndate = NOW() WHERE id = '$id'";
    
    $result = mysqli_query($db, $issueUpdateQuery);

    if ($result) {
        echo "<script>alert('Returned successfully!'); window.location.href='missue.php';</script>";
    } else {
        echo "Error updating returndate: " . mysqli_error($db);
    }
}

mysqli_close($db);
?>
