<html>
 <head>
  <title>Your submission</title>
 </head>
 <body>
 <br>

 <?php
	include "answerFactory.php";

	$answers = Array();
	$factory = new MySqlAnswerFactory();
	

	echo 'Number Of Questions =' . $_POST['numberOfQuestions'];
	
	for ( $x=1; $x<$_POST['numberOfQuestions'];$x++) {

		$answer = new Answer();

        	$answer->questionId= $x;
        	$answer->answer = $_POST[$x];
        	$answer->playerId= $_POST['player'];
        	$answer->quizId = $_POST['game'];

        	array_push($answers, $answer);

	}

	$factory->set($answers);
 ?>
 Thank you for playing, <a href="/#!/view1"> Choose your next game or play again</a>
 </body>
</html>
