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

$globalused = $_REQUEST["globalused"];
$category = $_REQUEST["category"];

if ($category == "All" ) {
	$sql = "SELECT * FROM $table_name
	WHERE used = $globalused
	ORDER BY RAND()
	LIMIT 1";
} else {
	$sql = "SELECT * FROM $table_name
	WHERE used = $globalused AND category = '$category'
	ORDER BY RAND()
	LIMIT 1";
}
$result = $conn->query($sql);

if ($result->num_rows > 0) { 
	while($row = $result->fetch_assoc()) {
	    echo $row["id"] . "_" . $row["picturename"] . "_" . "Pictures/" . $row["picturelocation"] . "_" . $row["hint1"] . "_" . $row["hint2"] . "_" . 0 . "_" . $row["submitteduser"] . "_" . $row["submittedusername"] ;
	}
} else {
	$sql = "SELECT * FROM $table_name
			WHERE used = $globalused + 1
			ORDER BY RAND()
			LIMIT 1";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
		echo $row["id"] . "_" . $row["picturename"] . "_" . "Pictures/" . $row["picturelocation"] . "_" . $row["hint1"] . "_" . $row["hint2"] . "_" . 1 . "_" . $row["submitteduser"] . "_" . $row["submittedusername"];
	}
};

$conn->close();
?>

