<?php
include "../connet.php";

$studentID = isset($_GET['studentID']) ? mysqli_real_escape_string($db, $_GET['studentID']) : '';
$bookID = isset($_GET['bookID']) ? mysqli_real_escape_string($db, $_GET['bookID']) : '';

$studentQuery = "SELECT * FROM tbsignup WHERE SID = '$studentID'";
$studentResult = mysqli_query($db, $studentQuery);

$allBooksQuery = "SELECT id, bookName FROM tbbooks";
$allBooksResult = mysqli_query($db, $allBooksQuery);

$bookQuery = "SELECT * FROM tbbooks WHERE id = '$bookID'";
$bookResult = mysqli_query($db, $bookQuery);

$issueQuery = "SELECT * FROM issuebook WHERE studentid = '$studentID' AND bookid = '$bookID'";
$issueResult = mysqli_query($db, $issueQuery);

$studentInfo = [];
$bookInfo = [];
$issueInfo = [];

if ($studentResult && mysqli_num_rows($studentResult) > 0) {
    $studentInfo = mysqli_fetch_assoc($studentResult);
}

if ($bookResult && mysqli_num_rows($bookResult) > 0) {
    $bookInfo = mysqli_fetch_assoc($bookResult);
}

if ($issueResult && mysqli_num_rows($issueResult) > 0) {
    $issueInfo = mysqli_fetch_assoc($issueResult);
}

mysqli_close($db);
?>