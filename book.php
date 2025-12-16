<?php
include "connet.php";

$query = "SELECT COUNT(*) AS bookss FROM tbbooks"; 
$result = mysqli_query($db, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    echo $row['bookss'];
} else {
    echo '0';
}
?>


