<?php
include "question.php";
include "db.php";

interface ScoresFactory{

	public function get();

}

class Score{
	public $playerId;
	public $score;
}

class MySqlScoreFactory implements ScoresFactory{

	public function get(){

		$conn = getConnection();

		$sql = "SELECT playerId,count(*) score" 
		.      "FROM Answers a, Questions q "
		.      "WHERE a.quizId = q.quizId "
		.      "AND  a.questionId = q.questionId "
		.      "AND  q.answer = a.answer "
		.      "GROUP BY playerId";

		$result = $conn->query($sql);
		$scores = Array();


                if ($result->num_rows > 0) {
                // output data of each row
                        while($row = $result->fetch_assoc()) {

                                $score = new score();

                                $score->playerId     = $row["playerId"];
                                $score->score   = $row["score"];
				
                                array_push($scores,  $score);
                   }
                } else {
                        echo "0 results", PHP_EOL;
                }


		$conn->close();

		return $scores;
	}

}

?>
