<?php
include "../connet.php";

$query = "SELECT COUNT(*) AS gen FROM tbgenre"; 
$result = mysqli_query($db, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    echo $row['gen'];
} else {
    echo '0';
}
?>
