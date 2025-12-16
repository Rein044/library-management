<?php
include "../connet.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $bookId = $_POST["bookId"];

    $deleteQuery = "DELETE FROM tbbooks WHERE id = $bookId";
    $deleteResult = mysqli_query($db, $deleteQuery);

    if ($deleteResult) {
        echo "Book deleted successfully!";
    } else {
        echo "Error deleting book: " . mysqli_error($db);
    }
} else {
    echo "Invalid request method.";
}

mysqli_close($db);
?>
