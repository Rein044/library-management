<?php
include "connet.php";

if (isset($_POST['submit'])) {
    $count = 0;

    $email = $_POST['email'];
    $password = $_POST['pass'];

    $stmt = mysqli_prepare($db, "SELECT SID, email, password FROM tbsignup WHERE email=? AND password=?");
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $count = mysqli_num_rows($result);
    

    if ($count == 0) {
        ?>
        <script type="text/javascript">
        alert("The Email and Password don't exist");
        window.location.href = "index.php"; 
        </script>
        <?php
    } else {

        $row = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['usersid'] = $row['SID'];

        ?>
        <script type="text/javascript">
        alert("Login Successfully");
        window.location.href = "dashboard.php"; 
        </script>
        <?php
    }

    mysqli_stmt_close($stmt);
}
?>
