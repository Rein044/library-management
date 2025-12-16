<?php
include "../connet.php";

$searchQuery = isset($_GET['search']) ? mysqli_real_escape_string($db, $_GET['search']) : '';

$query = "SELECT issuebook.*, tbsignup.fullname, tbbooks.bookName, tbbooks.isbn
          FROM issuebook
          JOIN tbsignup ON issuebook.studentid = tbsignup.SID
          JOIN tbbooks ON issuebook.bookid = tbbooks.id";

if (!empty($searchQuery)) {
    $query .= " WHERE tbsignup.fullname LIKE '%$searchQuery%' OR tbbooks.bookName LIKE '%$searchQuery%'";
}

$result = mysqli_query($db, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td style='text-align: left;'>{$row['id']}</td>";
            echo "<td style='text-align: left;'>{$row['fullname']}</td>";
            echo "<td style='text-align: left;'>{$row['bookName']}</td>";
            echo "<td style='text-align: left;'>{$row['isbn']}</td>";
            echo "<td style='text-align: left;'>{$row['issuedate']}</td>";
            echo "<td style='text-align: left;'>{$row['returndate']}</td>";
            echo "<td>";
            echo "<button onclick='editIssueBook(\"{$row['studentid']}\", \"{$row['bookid']}\")' style='border: 0px solid; height: 30px; width: 50px; border-radius: 5px; background-color: darkblue; color: white; font-size: 15px; font-weight: bold;'>Edit</button>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No matching records found.</td></tr>";
    }
} else {
    echo "<tr><td colspan='5'>Error fetching issued books: " . mysqli_error($db) . "</td></tr>";
}

mysqli_close($db);
?>


