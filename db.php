<?php
$host = 'localhost'; // Host name
$dbname = 'mayah_store'; // Your database name
$username = 'root'; // Default XAMPP username
$password = ''; // Default XAMPP password is empty (no space)

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
