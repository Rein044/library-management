<?php
include "../connet.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $genreID = isset($_POST["genreID"]) ? mysqli_real_escape_string($db, $_POST["genreID"]) : '';
    $genreName = isset($_POST["genreName"]) ? mysqli_real_escape_string($db, $_POST["genreName"]) : '';

    $updateQuery = "UPDATE tbgenre SET genrename = '$genreName' WHERE id = '$genreID'";
    $result = mysqli_query($db, $updateQuery);

    if ($result) {
        echo "<script>alert('Update successfully!'); window.location.href='mgenre.php';</script>";
    } else {
        echo "Error updating genre: " . mysqli_error($db);
    }
}

mysqli_close($db);
?>
