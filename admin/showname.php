<?php
include "../connet.php";

if (isset($_POST['stid'])) {
    $studentId = mysqli_real_escape_string($db, $_POST['stid']);

    $query = "SELECT fullname, Email, mobilenumber FROM tbsignup WHERE SID = '$studentId'";
    $result = mysqli_query($db, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "<p style='margin-top: 20px; margin-left: -79px;'>Name: {$row['fullname']}</p>";
        echo "<p style='margin-left: -79px;'>Email: {$row['Email']}</p>";
        echo "<p style='margin-left: -79px;'>Mobile Number: {$row['mobilenumber']}</p>";

    } else {
        echo "<p style='margin-top: 5px; margin-left: -79px; color: red;'>No student found.</p>";
    }
} 
?>