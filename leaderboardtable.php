<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $_POST["db_name"]);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create table
$sql = "CREATE TABLE $_POST[table_name] (
id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
playername VARCHAR(50) NOT NULL,
playerid VARCHAR(50) NOT NULL,
score INT(50) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table $_POST[table_name] created successfully in database $_POST[db_name]";
} else if ($conn->query($sql) === FALSE){
	$sql = "DROP TABLE $_POST[table_name]";
	if ($conn->query($sql) === TRUE) {
		echo "Table $_POST[table_name] deleted successfully from database $_POST[db_name]";
	} else {
		echo "Error: " . $conn->error;
	}
}

$conn->close();
?>

<br>
<br>

<form action="database.html">
    <input type="submit" value="Back" />
</form>

</body>
</html>