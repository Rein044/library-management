<?php
include "../connet.php";

$searchQuery = isset($_GET['search']) ? mysqli_real_escape_string($db, $_GET['search']) : '';

$query = "SELECT * FROM tbgenre"; 

if (!empty($searchQuery)) {
    $query .= " WHERE genreName LIKE '%$searchQuery%'"; 
}

$result = mysqli_query($db, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td style='text-align: left;'>{$row['id']}</td>"; 
            echo "<td style='text-align: left;'>{$row['genrename']}</td>"; 
            echo "<td style='text-align: left;'>{$row['createddate']}</td>"; 
            echo "<td style='text-align: left;'>{$row['updationdate']}</td>";
            echo "<td>";
            echo "<button onclick='editGenre(\"{$row['id']}\")' style='border: 0px solid; height: 30px; width: 50px; border-radius: 5px; background-color: darkblue; color: white; font-size: 15px; font-weight: bold;'>Edit</button>";
            echo "<button onclick='deleteGenre({$row['id']})' style='border: 0px solid; height:30px; width: 60px; border-radius: 5px;  background-color: red; color: white; margin-left:10px; font-size: 15px; font-weight: bold;'>Delete</button>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No matching records found.</td></tr>";
    }
} else {
    echo "<tr><td colspan='3'>Error fetching genres: " . mysqli_error($db) . "</td></tr>";
}

mysqli_close($db);
?>
