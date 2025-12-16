<?php
include "../connet.php";

$searchQuery = isset($_GET['search']) ? mysqli_real_escape_string($db, $_GET['search']) : '';

$query = "SELECT * FROM tbbooks";

if (!empty($searchQuery)) {
    $query .= " WHERE bookName LIKE '%$searchQuery%' OR bookAuthors LIKE '%$searchQuery%' OR bookCategory LIKE '%$searchQuery%' OR isbn LIKE '%$searchQuery%'";
}

$result = mysqli_query($db, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            
            echo "<tr>";
            echo "<td style='text-align: center;'>{$row['id']}</td>";
            echo "<td style='text-align: left;'>";
            echo "<img src='uploads/{$row['bookimg']}' alt='{$row['bookName']} Image' style='width: 130px; height: 170px; margin-bottom: 20px;'><br>";
            echo "<span style='font-size: 15px; font-weight: bold;'>{$row['bookName']}</span>";
            echo "<td style='text-align: left;'>{$row['bookAuthors']}</td>";
            echo "<td style='text-align: left;'>{$row['bookCategory']}</td>";
            echo "<td style='text-align: left;'>{$row['isbn']}</td>";
            echo "<td>";
            echo "<button onclick='editBook({$row['id']})' style='border: 0px solid; height: 30px;  width: 50px; border-radius: 5px; background-color: darkblue; color: white; font-size: 15px; font-weight: bold;'>Edit</button>";
            echo "<button onclick='deleteBook({$row['id']})'style='border: 0px solid; height:30px; width: 60px; border-radius: 5px;  background-color: red; color: white; margin-left:10px; font-size: 15px; font-weight: bold;'>Delete</button>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No matching records found.</td></tr>";
    }
} else {
    echo "<tr><td colspan='5'>Error fetching books: " . mysqli_error($db) . "</td></tr>";
}

mysqli_close($db);
?>
