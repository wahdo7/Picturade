<?php
$name = $_REQUEST["playername"];
$id = $_REQUEST["playerid"];
$score = $_REQUEST["score"];
$category = $_REQUEST["category"];
$facebook = $_REQUEST["facebook"];

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "WebGame";
$table_name = "Leaderboard" . $category;

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if ($facebook == "True") {
	$sql = "INSERT INTO $table_name (playername, playerid, score)
	VALUES ('$name', '$id', '$score')";
	$conn->query($sql);
}

$sql = "SELECT * FROM $table_name
ORDER BY score
desc
LIMIT 5";

$result = $conn->query($sql);

if ($result->num_rows > 0) { 
	while($row = $result->fetch_assoc()) {
	    echo $row["playername"] . "_" . $row["playerid"] . "_" . $row["score"] . "_";
	}
} else {
	echo "-_-_-_-_-_-_-_-_-_-_-_-_-_-_-";
};

if ($facebook == "True") {
	$sql = "SELECT x.position
	FROM (SELECT t.playername,
	t.playerid,
	t.score,
	@rownum := @rownum + 1 AS position
	FROM $table_name t
	JOIN (SELECT @rownum := 0) r
	ORDER BY t.score DESC) x
	WHERE x.score = $score AND x.playerid = $id
	LIMIT 1";
	
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo $row["position"];
		}
	} else {
		echo "0";
	};
}

$conn->close();
?>