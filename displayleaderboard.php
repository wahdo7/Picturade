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

$sql = "SELECT id, playername, playerid, score FROM $_POST[table_name]";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. "<br>" . "Player Name: " . $row["playername"]. "<br>" . "Player Id: " . $row["playerid"]. "<br>" . "Score: " . $row["score"]. "<br>" . "<br>";
    }
} else {
    echo "Table $_POST[table_name] in database $_POST[db_name] is empty.";
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