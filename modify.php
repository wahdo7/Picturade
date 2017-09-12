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

$sql = "UPDATE $_POST[table_name] SET picturelocation = '$_POST[picture_location]', hint1 = '$_POST[hint_1]', hint2 = '$_POST[hint_2]', used = $_POST[used] , category = '$_POST[category]' WHERE picturename = '$_POST[entry_name]'";

if ($conn->query($sql) === TRUE) {
    echo "Record $_POST[entry_name] updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
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