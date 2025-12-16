<?php
include "../connet.php";

$query = "SELECT COUNT(*) AS student FROM tbsignup"; 
$result = mysqli_query($db, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    echo $row['student'];
} else {
    echo '0';
}
?>
