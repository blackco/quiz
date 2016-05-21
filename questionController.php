<?php
include "questionFactory.php";

function objects(){
 $questions = decode( getQuestions('question.json') );

 foreach($questions as $question){
                echo 'Question: ' , $question->question , PHP_EOL;
                echo 'Answer: ' , $question->answer , PHP_EOL;

	foreach( $question->options as $option){
		echo 'Options: ' , $option, PHP_EOL;
	}
 }
}

function json(){
	$questions = getQuestions('questions.json');

	echo $questions;
}


objects();
?>
