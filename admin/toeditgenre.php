<?php
include "../connet.php";

$genreID = isset($_GET['id']) ? mysqli_real_escape_string($db, $_GET['id']) : '';

$query = "SELECT * FROM tbgenre WHERE id = '$genreID'";
$result = mysqli_query($db, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $genreInfo = mysqli_fetch_assoc($result);
} else {
    echo "Author not found.";
    exit();
}

mysqli_close($db);
?>