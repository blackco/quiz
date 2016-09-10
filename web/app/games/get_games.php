<?php
	include "db.php";

 	class quiz{

		public $quizId;
		public $name;
	}

	class quizFactory{


		public function get(){

			$conn      = getConnection();
                	$quizes    = Array();

                	$sql 	   = "SELECT DISTINCT quizId,quizId FROM Questions" ;

                	$result = $conn->query($sql);

                	if ($result->num_rows > 0) {
                	// output data of each row
                        	while($row = $result->fetch_assoc()) {

                                	$quiz = new quiz();

                                	$quiz->quizId = $row["quizId"];
                                	$quiz->name   = $row["quizId"];

					array_push($quizes, $quiz);
				}

			}

			$conn->close();

                	return $quizes;
		}
	}

	function build(){

		$games = Array();

		$quiz1 = new quiz();

		$quiz1->id = 1;
	        $quiz1->name = "World Cup Football";	

		array_push($games, $quiz1);

	
		$quiz2 = new quiz();

                $quiz2->id = 1;
                $quiz2->name = "Where's Wally";

                array_push($games, $quiz2);

		return $games;
	}


	$quizFactory = new quizFactory();
	echo json_encode($quizFactory->get()), PHP_EOL;
?>
