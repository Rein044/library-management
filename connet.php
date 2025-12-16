<?php
// Auto-detect environment
if ($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_ADDR'] == '127.0.0.1') {
    // LOCAL DEVELOPMENT
    $servername = "localhost";
    $username = 'root';
    $password = '';
    $dbname = 'library';
} else {
    // HOSTINGER PRODUCTION
    $servername = "localhost";
    $username = 'u666365399_library';
    $password = 'u666365399_Library';
    $dbname = 'u666365399_library';
}

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional: Set charset for proper encoding
$conn->set_charset("utf8mb4");
