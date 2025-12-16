<?php
include "../connet.php";

$query = "SELECT COUNT(*) AS issue FROM issuebook"; 
$result = mysqli_query($db, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    echo $row['issue'];
} else {
    echo '0';
}
?>
