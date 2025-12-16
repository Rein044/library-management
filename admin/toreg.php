<?php
include "../connet.php";

$searchQuery = isset($_GET['search']) ? mysqli_real_escape_string($db, $_GET['search']) : '';

$query = "SELECT * FROM tbsignup"; 

if (!empty($searchQuery)) {
    $query .= " WHERE columnName LIKE '%$searchQuery%'";
}

$result = mysqli_query($db, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td style='text-align: left;'>{$row['id']}</td>"; 
            echo "<td style='text-align: left;'>{$row['SID']}</td>"; 
            echo "<td style='text-align: left;'>{$row['fullname']}</td>"; 
            echo "<td style='text-align: left;'>{$row['Email']}</td>";
            echo "<td style='text-align: left;'>{$row['mobilenumber']}</td>"; 
            echo "<td style='text-align: left;'>{$row['regdate']}</td>";
            echo "<td>";
            echo "<button onclick='StudentDetails(\"{$row['SID']}\")' style='border: 0px solid; height: 30px; width: 70px; border-radius: 5px; background-color: green; color: white; font-size: 15px; font-weight: bold;'>Details</button>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No matching records found.</td></tr>";
    }
} else {
    echo "<tr><td colspan='3'>Error fetching students: " . mysqli_error($db) . "</td></tr>";
}

mysqli_close($db);
?>
