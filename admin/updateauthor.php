<?php
include "../connet.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $authorID = isset($_POST["authorID"]) ? mysqli_real_escape_string($db, $_POST["authorID"]) : '';
    $authorName = isset($_POST["authorName"]) ? mysqli_real_escape_string($db, $_POST["authorName"]) : '';

    $updateQuery = "UPDATE tbautor SET authorname = '$authorName' WHERE id = '$authorID'";
    $result = mysqli_query($db, $updateQuery);

    if ($result) {
        echo "<script>alert('Update successfully!'); window.location.href='mautors.php';</script>";
    } else {
        echo "Error updating author: " . mysqli_error($db);
    }
}

mysqli_close($db);
?>
