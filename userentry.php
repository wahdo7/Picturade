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

$name = $_REQUEST["picname"];
$location = $_REQUEST["piclocation"];
$hint1 = $_REQUEST["hint_1"];
$hint2 = $_REQUEST["hint_2"];
$category = $_REQUEST["category"];
$user = $_REQUEST["user"];
$username = $_REQUEST["username"];


$hint1modified = str_replace("'","\'", $hint1);
$hint2modified = str_replace("'","\'", $hint2);

$sql = "INSERT INTO $table_name (picturename, picturelocation, hint1, hint2, category, submitteduser, submittedusername)
VALUES ('$name', '$location', '$hint1modified', '$hint2modified', '$category', '$user', '$username')";

if ($conn->query($sql) === TRUE) {
	echo "Done";
} else {
	echo "Error";
}

$conn->close();
?>