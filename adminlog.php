<?php
include "connet.php";

if (isset($_POST['admin'])) {
    $count = 0;

    $email = $_POST['email'];
    $password = $_POST['pass'];

    $stmt = mysqli_prepare($db, "SELECT * FROM admins WHERE email=? AND password=?");
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $count = mysqli_num_rows($result);
    mysqli_stmt_close($stmt);

    if ($count == 0) {
        ?>
        <script type="text/javascript">
        alert("The Email and Password don't exist");
        
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
        alert("Login Successfully");
        window.location.href = "admin/administrator.php"; 
        </script>
        <?php
    }
}
?>
