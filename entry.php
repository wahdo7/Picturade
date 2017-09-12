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

$hint1modified = str_replace('','_', $_POST['hint_1']);
$hint1modified = str_replace("'","\'", $_POST['hint_1']);
$hint2modified = str_replace('','_', $_POST['hint_2']);
$hint2modified = str_replace("'","\'", $_POST['hint_2']);

$sql = "INSERT INTO $_POST[table_name] (picturename, picturelocation, hint1, hint2, category)
VALUES ('$_POST[entry_name]', '$_POST[picture_location]', '$hint1modified', '$hint2modified', '$_POST[category]')";

if ($conn->query($sql) === TRUE) {
    echo "New entry $_POST[entry_name] created successfully in table $_POST[table_name]";
} else {
	$sql = "DELETE FROM $_POST[table_name] 
	WHERE picturename = '$_POST[entry_name]'";
	if ($conn->query($sql) === TRUE) {
		echo "Entry $_POST[entry_name] deleted successfully from table $_POST[table_name] ";
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