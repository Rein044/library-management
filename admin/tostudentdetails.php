<?php
include "../connet.php";

$selectedSID = isset($_GET['SID']) ? mysqli_real_escape_string($db, $_GET['SID']) : '';

$query = "SELECT issuebook.studentid, tbsignup.fullname, tbbooks.BookName, issuebook.issuedate, issuebook.returndate
          FROM issuebook
          JOIN tbsignup ON issuebook.studentid = tbsignup.SID
          JOIN tbbooks ON issuebook.Bookid = tbbooks.id
          WHERE tbsignup.SID = '$selectedSID'";

$result = mysqli_query($db, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td style='text-align: left;'>{$row['studentid']}</td>";
            echo "<td style='text-align: left;'>{$row['fullname']}</td>";
            echo "<td style='text-align: left;'>{$row['BookName']}</td>";
            echo "<td style='text-align: left;'>{$row['issuedate']}</td>";
            echo "<td style='text-align: left;'>{$row['returndate']}</td>";
            echo "</tr>";
        }
    }
} else {
    echo "<tr><td colspan='5'>Error fetching issue records: " . mysqli_error($db) . "</td></tr>";
}

mysqli_close($db);
?>
