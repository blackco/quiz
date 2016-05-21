<?php

include "question.php";

class optionChecked{
	public $text;
	public $checked;
}

function build(){

	$questions = Array();

	$question1 = new question();

	$question1->question = "Who won the world cup in 1966";
	$question1->answer   = "England";
	$options  = Array();

		$option1 = new OptionChecked();
		$option1->text = "England";
		$option1->checked = "";
		array_push($options, $option1);

		$option2 = new OptionChecked();
                $option2->text = "Brazil";
                $option2->checked = "checked";
                array_push($options, $option2);

		$option3 = new OptionChecked();
                $option3->text = "Germany";
                $option3->checked = "";
                array_push($options, $option3);

	$question1->options = $options;

	array_push($questions, $question1);

	$question2 = new question();

        $question2->question = "Who won the world cup in 1982";
        $question2->answer   = "Italy";
	$options2  = Array("Argentina" ,"Spain","Brazil","Germany","Italy");
        /*$question2>options = $options2;*/

        array_push($questions, $question2);

	return $questions;
	
}


function getFile(){
	$filename = 'question.json';
        if (file_exists($filename)) {
                $json = file($filename);
        }
	
	return $json;

}

echo json_encode(build()) ,PHP_EOL;


?>
