<?php
session_start();
include "connet.php";

if (isset($_SESSION['usersid'])) {
    $userSid = $_SESSION['usersid'];

    $queryCount = "SELECT COUNT(*) AS count
                   FROM issuebook
                   WHERE studentid = '$userSid' AND returndate IS NULL";

    $resultCount = mysqli_query($db, $queryCount);

    if ($resultCount) {
        $row = mysqli_fetch_assoc($resultCount);
        $numNotReturned = $row['count'];

        echo "$numNotReturned";
    } else {
        echo "<p>Error counting not returned books: " . mysqli_error($db) . "</p>";
    }
} else {
    echo "<p>User not logged in.</p>";
}

mysqli_close($db);
?>
