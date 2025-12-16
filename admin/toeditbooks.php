<?php
include "../connet.php";

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["bookId"])) {
    $bookId = $_GET["bookId"];

    $query = "SELECT * FROM tbbooks WHERE id = $bookId";
    $result = mysqli_query($db, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $bookDetails = mysqli_fetch_assoc($result);
    }}
?>