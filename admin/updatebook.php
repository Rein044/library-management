<?php
include "../connet.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["bookId"])) {
    $bookId = $_POST["bookId"];
    $bookName = $_POST["bookName"];
    $bookAuthors = $_POST["bookAuthors"];
    $bookCategory = $_POST["bookCategory"];

    $query = "UPDATE tbbooks SET bookName='$bookName', bookAuthors='$bookAuthors', bookCategory='$bookCategory' WHERE id='$bookId'";

    $result = mysqli_query($db, $query);

    if ($result) {
        echo "<script>alert('Book information updated successfully!'); window.location.href='mbooks.php';</script>";
    } else {
        echo "Error updating book information: " . mysqli_error($db);
    }
} else {
    echo "Invalid request!";
}
?>
