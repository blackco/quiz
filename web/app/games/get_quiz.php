<?php

include "questionFactory.php";


$factory  = new MySqlQuizFactory();
echo json_encode($factory->get($_GET['quizId'])), PHP_EOL; 

?>
