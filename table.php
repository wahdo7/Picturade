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
picturename VARCHAR(26) NOT NULL UNIQUE,
picturelocation VARCHAR(26) NOT NULL,
hint1 VARCHAR(80) NOT NULL,
hint2 VARCHAR(80) NOT NULL,
category VARCHAR(50) DEFAULT 'None',
used INT(2) DEFAULT 0,
submitteduser VARCHAR(50) DEFAULT 'None',
submittedusername VARCHAR(50) DEFAULT 'None'
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