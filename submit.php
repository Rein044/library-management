<?php
include "connet.php";

if (isset($_POST['submit'])) {
    $count = 0;
    $sql = "SELECT email FROM tbsignup";
    $res = mysqli_query($db, $sql);

    while ($row = mysqli_fetch_assoc($res)) {
        if ($row['email'] == $_POST['email']) {
            $count = $count + 1;
        }
    }

    if ($count == 0) {
        $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
        $mobilenumber = mysqli_real_escape_string($db, $_POST['mobilenumber']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

       
        $query = "SELECT MAX(SID) AS max_sid FROM tbsignup";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);
        $max_sid = $row['max_sid'];

        if ($max_sid === null) {
            $sid = "SID01";
        } else {
            $sid = "SID" . sprintf('%02d', intval(substr($max_sid, 3)) + 1);
        }

        $query = "INSERT INTO tbsignup (fullname, mobilenumber, email, password, SID) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($db, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssss", $fullname, $mobilenumber, $email, $password, $sid);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }

        ?>
        <script type="text/javascript">
        alert("Registration Successful and your StudentNumber is <?php echo $sid; ?>");
        window.location.href = "index.php";
        </script>
        <?php
        
    } else {
        ?>
        <script type="text/javascript">
        alert("Email Already Exists");  
         </script>
        <?php
    }
}
?>
