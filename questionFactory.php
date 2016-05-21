<?php
include "question.php";

function getQuestions($filename){

$json='';

	if (file_exists($filename)) {
        	$json = file($filename);
	}

return $json;
}

function decode($json){
	$questions = Array();

	foreach ( $json as $element){
		$myQuestion =  buildQuestion($element);

		array_push($questions, $myQuestion);
	}

	return $questions;
}

function buildQuestion($json){

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

?>
