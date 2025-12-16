<?php
session_start();
include "connet.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userSid = $_SESSION['usersid'];
    $currentPassword = mysqli_real_escape_string($db, $_POST['currentPassword']);
    $newPassword = mysqli_real_escape_string($db, $_POST['newPassword']);
    $confirmPassword = mysqli_real_escape_string($db, $_POST['confirmPassword']);

    
    $query = "SELECT password FROM tbsignup WHERE SID = '$userSid'";
    $result = mysqli_query($db, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['password'];

        if ($currentPassword === $storedPassword) {
            
            if ($newPassword === $confirmPassword) {
            
                $updateQuery = "UPDATE tbsignup SET password = '$newPassword' WHERE SID = '$userSid'";
                $updateResult = mysqli_query($db, $updateQuery);

                if ($updateResult) {
                    echo '<script>
                    alert("Password updated successfully!");
                    window.location.href = "dashboard.php";
                        </script>';
                } else {
                    echo "Error updating password: " . mysqli_error($db);
                }
            } else {
                echo "New password and confirm password do not match.";
            }
        } else {
            echo "Incorrect current password.";
        }
    }
}
?>
