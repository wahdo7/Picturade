<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE $_POST[db_name]";
if ($conn->query($sql) === TRUE) {
    echo "Database $_POST[db_name] created successfully";
} else if ($conn->query($sql) === FALSE){
	$sql = "DROP DATABASE $_POST[db_name]";
	if ($conn->query($sql) === TRUE) {
		echo "Database $_POST[db_name] deleted successfully";
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