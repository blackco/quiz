<?php
include "question.php";
include "db.php";

interface AnswerFactory{

	public function set($answers);

}

class Answer{
	public $quizId;
	public $questionId;
	public $playerId;
	public $answer;
}

class FileAnswerFactory implements AnswerFactory{
 
	public function set($answers){

	 	foreach ( $answers as $answer){
			
			if ($file == null) {
				$file = scoresFilename($answer->playerId , $answer->quizId);
			}

        		file_put_contents($file, $answer->questionId . '|' . $answer->answer .'|' . PHP_EOL , FILE_APPEND | LOCK_EX);
  		}
	}

}

class MySqlAnswerFactory implements AnswerFactory{

	public function set($answers){

		$conn = getConnection();

		$sql = "";

		foreach ( $answers as $answer ){
		
	                $sql = $sql . " DELETE FROM Answers  WHERE " 
                        . "quizId = " . "'" . $answer->quizId . "'"
                        . " AND questionId = " . "'" . $answer->questionId . "'"
                        . " AND playerId = " . "'" . $answer->playerId . "';";

	   		$sql = $sql . " INSERT INTO Answers (quizId,questionId,playerId,answer) VALUES (" 
			. "'" . $answer->quizId . "',"
			. "'" . $answer->questionId . "',"
			. "'" . $answer->playerId . "',"
			. "'" . $answer->answer . "'); ";


		}

		if (  $conn->multi_query($sql) === TRUE ){
			/* All Ok */
		} else {
			/* echo "Error: "  . $sql . "<br>" . $conn-error; */
			echo "Error: " . $sql;	
		}


		$conn->close();
	}

}

?>
