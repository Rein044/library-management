<?php
include "../connet.php";

if (isset($_POST['submit'])) {
    $genreName = mysqli_real_escape_string($db, $_POST['genrename']);

    $queryCheck = "SELECT * FROM tbgenre WHERE genrename = '$genreName'";
    $resultCheck = mysqli_query($db, $queryCheck);

    if (mysqli_num_rows($resultCheck) > 0) {
        echo "<p style='margin-top: 5px; margin-left: 20px; color: red;'>Genre already exist</p>";
    } else {

        $queryAdd = "INSERT INTO tbgenre (genrename) VALUES ('$genreName')";
        $resultAdd = mysqli_query($db, $queryAdd);

        if ($resultAdd) {
            echo '<script type="text/javascript">alert("Genre added successfully!");  window.location.href = "administrator.php";</script>';
        } else {
            echo '<script type="text/javascript">alert("Error adding genre.");</script>';
        }
    }
}
?>
