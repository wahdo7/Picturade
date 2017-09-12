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

$submission = $_REQUEST["submission"];

$sql = "SELECT * FROM $table_name
		WHERE picturename = '$submission'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo $row["picturename"] . "_" . "Pictures/" . $row["picturelocation"] . "_" . 0;
	}
} else {
	echo 0 . "_" . 0 . "_" . 1;
};

$conn->close();