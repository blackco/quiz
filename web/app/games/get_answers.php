<?php

 class answer{
	public $quiz;
	public $id;
	public $player;
	public $answer;
  }


  function build($quiz, $id, $player, $answer){
 
   $ret = new answer();

	$ret->quiz = $quiz;
	$ret->id   = $id;
	$ret->player = $player;
	$ret->answer = $answer;

	return $ret;

  }

  $answers = Array();

  array_push($answers, build("WorldCup",1,1,1));
  array_push($answers, build("WorldCup",2,1,2));

  echo json_encode($answers), PHP_EOL;
?>
