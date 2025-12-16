<?php
include "../connet.php";

if (isset($_POST['submit'])) {
    $bookName = mysqli_real_escape_string($db, $_POST['bookName']);
    $bookAuthor = mysqli_real_escape_string($db, $_POST['bookAuthors']);
    $bookCategory = mysqli_real_escape_string($db, $_POST['bookCategory']);
    $isbn = mysqli_real_escape_string($db, $_POST['isbn']);

    
    $queryCheck = "SELECT * FROM tbbooks WHERE bookName = ?";
    $stmtCheck = mysqli_prepare($db, $queryCheck);
    mysqli_stmt_bind_param($stmtCheck, "s", $bookName);
    mysqli_stmt_execute($stmtCheck);
    mysqli_stmt_store_result($stmtCheck);

    if (mysqli_stmt_num_rows($stmtCheck) > 0) {
        echo "<p style='margin-top: 5px; margin-left: 40px; color: red;'>Book name already exists</p>";
    } else {
        
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["bookimg"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        if (isset($_FILES["bookimg"]["tmp_name"]) && !empty($_FILES["bookimg"]["tmp_name"])) {
    
            $check = getimagesize($_FILES["bookimg"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        } else {
            echo "No file uploaded.";
            $uploadOk = 0;
        }
        
        if ($_FILES["bookimg"]["size"] > 50000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["bookimg"]["tmp_name"], $targetFile)) {
                $query = "INSERT INTO tbbooks (bookName, bookAuthors, bookCategory, isbn, bookimg) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($db, $query);

                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "sssss", $bookName, $bookAuthor, $bookCategory, $isbn, basename($_FILES["bookimg"]["name"]));
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);
                    ?>
                    <script type="text/javascript">
                        alert("Book added successfully!");
                        window.location.href = "administrator.php";
                    </script>
                    <?php
                } else {
                    echo "Error preparing the statement.";
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "File upload failed.";
        }
    }
}
?>
