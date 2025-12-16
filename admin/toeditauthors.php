<?php
include "../connet.php";

$authorID = isset($_GET['id']) ? mysqli_real_escape_string($db, $_GET['id']) : '';

$query = "SELECT * FROM tbautor WHERE id = '$authorID'";
$result = mysqli_query($db, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $authorInfo = mysqli_fetch_assoc($result);
} else {
    echo "Author not found.";
    exit();
}

mysqli_close($db);
?>