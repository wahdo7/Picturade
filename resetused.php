<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "WebGame";
$table_name = "Pictures";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE $table_name
		SET used = 0
		WHERE used != 0";
$result = $conn->query($sql);

$conn->close();
?>