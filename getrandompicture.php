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

$sql = "SELECT * FROM $table_name
	ORDER BY RAND()
	LIMIT 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) { 
	while($row = $result->fetch_assoc()) {
	    echo "Pictures/" . $row["picturelocation"];
	}
};

$conn->close();
?>