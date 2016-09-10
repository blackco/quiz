<?php

function getConnection(){
	$servername = "localhost";
	$username = "root";
	$password = "xxxxx"; <!-- Hint: Swings it in Gower's Ashes -->
	$db = "quizes";

	// Create connection
	$conn = new mysqli($servername, $username, $password,$db);

	// Check connection
	if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
	}

	return $conn;
}

function getQuizes(){

 	$conn = getConnection();
	$games = Array();

	$sql = "SELECT DISTINCT quizId FROM Questions";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    	// output data of each row
    		while($row = $result->fetch_assoc()) {
			array_push($games, $row["quizId"]);
    		}
	} else {
    		echo "0 results", PHP_EOL;
	}

	$conn->close();

	return $games;

}

?>
