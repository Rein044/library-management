<?php
include "../connet.php";

$genreID = isset($_POST['deleteGenreID']) ? mysqli_real_escape_string($db, $_POST['deleteGenreID']) : '';

$deleteQuery = "DELETE FROM tbgenre WHERE id = '$genreID'";
$result = mysqli_query($db, $deleteQuery);

if ($result) {
    echo "Genre deleted successfully.";
} else {
    echo "Error deleting genre: " . mysqli_error($db);
}

mysqli_close($db);
?>
