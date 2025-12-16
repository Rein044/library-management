<?php
include "../connet.php";

if (isset($_POST['submit'])) {
    $authorName = mysqli_real_escape_string($db, $_POST['authorname']);

    $queryCheck = "SELECT * FROM tbautor WHERE authorname = '$authorName'";
    $resultCheck = mysqli_query($db, $queryCheck);

    if (mysqli_num_rows($resultCheck) > 0) {
        echo "<p style='margin-top: 5px; margin-left: 20px; color: red;'>Author already exist</p>";
    } else {
        
        $queryAdd = "INSERT INTO tbautor (authorname) VALUES ('$authorName')";
        $resultAdd = mysqli_query($db, $queryAdd);

        if ($resultAdd) {
            echo '<script type="text/javascript">alert("Author added successfully!"); window.location.href = "administrator.php";</script>';

        } else {
            echo '<script type="text/javascript">alert("Error adding author.");</script>';
        }
    }
}
?>
