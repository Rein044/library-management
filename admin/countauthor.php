<?php
include "../connet.php";

$query = "SELECT COUNT(*) AS author FROM tbautor"; 

if ($result) {
    $row = mysqli_fetch_assoc($result);
    echo $row['author'];
} else {
    echo '0';
}
?>
