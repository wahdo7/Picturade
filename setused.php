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

$id = $_REQUEST["id"];

$sql = "UPDATE $table_name
		SET used = used + 1
		WHERE id = $id";
$result = $conn->query($sql);

$conn->close();
?>