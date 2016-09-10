<?php
	
 	class quiz{

		public $id;
		public $name;
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

	echo json_encode(build()), PHP_EOL;
?>
