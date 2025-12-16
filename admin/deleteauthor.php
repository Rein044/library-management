<?php
include "../connet.php";

$authorID = isset($_GET['id']) ? mysqli_real_escape_string($db, $_GET['id']) : '';

$deleteQuery = "DELETE FROM tbautor WHERE id = '$authorID'";
$result = mysqli_query($db, $deleteQuery);

if ($result) {
    echo "<script>window.location.href='mautors.php';</script>";
} else {
    echo "Error deleting author: " . mysqli_error($db);
}

mysqli_close($db);
?>
