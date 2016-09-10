<?php
include "question.php";
include "db.php";


interface QuizFactory{

	public function get($quizId);

}


class FileQuizFactory implements QuizFactory{
 
	public function get($quizId){

		$json='';
	
		$filename = $quizId . ".json";

		if (file_exists($filename)) {
        		$json = file($filename);
		}

		return decode($json);
	}

	private function decode($json){
		$questions = Array();

		foreach ( $json as $element){
			$myQuestion =  buildQuestion($element);

			array_push($questions, $myQuestion);
		}

		return $questions;
	}

	private function buildQuestion($json){

                $result = new question();
                $data = json_decode($json, true);

                foreach($data as $key=>$value){

                        if ( $key == "question"){
                                $result->question = $value;
                        }

                        if ($key == "answer"){
                                $result->answer = $value;

                        }

                        if ($key == "options" ){
                                foreach($value as $key=>$value){
                                        echo 'option:', $value , PHP_EOL;
                                        array_push($result->options , $value);
                                }

                                foreach($result->options  as $myOption){
                                        echo 'myOption ' , $myOption, PHP_EOL;
                                }
                        }

                }

                return $result;

	}
}

class MySqlQuizFactory implements QuizFactory{

	public function set($questions){

		$conn = getConnection();

		$sql = "";

		foreach ( $questions as $question ){
	
	   		$sql = $sql . "INSERT INTO Questions (quizId,questionId,question,answer) VALUES (" 
			. "'" . $question->quizId . "',"
			. "'" . $question->questionId . "',"
			. "'" . $question->question . "',"
			. "'" . $question->answer . "');";


	   		foreach ( $question->options as $option ){

				$sql = $sql . "INSERT INTO Options (quizId,questionId,possibleAnswer) VALUES ("
				. "'" . $question->quizId . "',"
				. "'" . $question->questionId . "',"
				. "'" . $option->text . "');";
	  		}

		}

		if (  $conn->multi_query($sql) === TRUE ){
			/* All Ok */
		} else {
			/* echo "Error: "  . $sql . "<br>" . $conn-error; */
			echo "Error: " . $sql;	
		}


		$conn->close();
	}

	public function get($quizId){

		$conn      = getConnection();
		$questions = Array();

		$sql = "SELECT DISTINCT quizId,questionId,question,answer FROM Questions WHERE quizId = '" . $quizId . "'" ;

		$result = $conn->query($sql);


		if ($result->num_rows > 0) {
        	// output data of each row
                	while($row = $result->fetch_assoc()) {

				$question = new question();

				$question->quizId 	= $row["quizId"];
				$question->questionId   = $row["questionId"];
				$question->question     = $row["question"];
				$question->answer       = $row["answer"];

				$questions[$question->questionId] = $question;
                   }
        	} else {
                	echo "0 results", PHP_EOL;
        	}

		$sql = "CALL GetOptionsWithAnswer()";

		$result = $conn->query($sql);


        	if ($result->num_rows > 0) {
        	// output data of each row
                	while($row = $result->fetch_assoc()) {

				$question = $questions[$row["questionId"]];

				$option = new optionChecked();

				$option->text = $row["possibleAnswer"];
				$option->checked = $row["playerAnswer"];

				array_push($question->options, $option);
			}
		}
		
		$conn->close();

		return $questions;
	}
}

?>
