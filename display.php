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

$sql = "SELECT id, picturename, picturelocation, hint1, hint2, category, used, submitteduser, submittedusername FROM $_POST[table_name]";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. "<br>" . "Picture Name: " . $row["picturename"]. "<br>" . "Picture Location: " . $row["picturelocation"]. "<br>" . "Hint 1: " . $row["hint1"]. "<br>" . "Hint 2: " . $row["hint2"]. "<br>" . "Category: " . $row["category"] . "<br>" . "Used: " . $row["used"]. "<br>" . "Submitted User: " . $row["submitteduser"]. "<br>" . "Submitted User Name: " . $row["submittedusername"]. "<br>" . "<br>";
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