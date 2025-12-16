<?php
session_start();
include "connet.php";

if (isset($_SESSION['usersid'])) {
    $userSid = $_SESSION['usersid'];

    $query = "SELECT * FROM tbsignup WHERE SID = '$userSid'";
    
    $result = mysqli_query($db, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            $studentId = $row['SID'];
            $reg = $row['regdate'];
            $studentName = $row['fullname'];
            $num = $row['mobilenumber'];
            $email = $row['Email'];
        } else {
            echo "<p>No user found for the specified student ID.</p>";
        }
    } else {
        echo "<p>Error fetching user information: " . mysqli_error($db) . "</p>";
    }
} else {
    echo "<p>User not logged in.</p>";
}

if (isset($_POST['update'])) {
    $newFullName = mysqli_real_escape_string($db, $_POST['newfullname']);
    $newMobileNumber = mysqli_real_escape_string($db, $_POST['newmobilenumber']);

    $updateQuery = "UPDATE tbsignup SET fullname = '$newFullName', mobilenumber = '$newMobileNumber' WHERE SID = '$userSid'";
    $updateResult = mysqli_query($db, $updateQuery);

    if ($updateResult) {
        echo '<script type="text/javascript">alert("Information updated successfully!"); window.location.href = "myprofile.php";</script>';
    } else {
        echo '<script type="text/javascript">alert("Error updating information.");</script>';
    }
}

mysqli_close($db);
?>
