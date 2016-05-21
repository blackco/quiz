<?php
	
 	class player{

		public $id;
		public $name;
	}

	function build(){

		$players = Array();

		$player1 = new player();

		$player1->id = "CB";
	        $player1->name = "Colin";	

		array_push($players, $player1);

  		$player2 = new player();

                $player2->id = "CCB";
                $player2->name = "Chloe";

                array_push($players, $player2);

		return $players;
	}

	echo json_encode(build()), PHP_EOL;
?>
