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
	
	$answer = new Answer();
	
	$answer->questionId= 1;

	$answer->answer	= $_POST['1'];
	$answer->playerId= $_POST['player'];
	$answer->quizId	= $_POST['game'];

	array_push($answers, $answer);

 	$answer = new Answer();

        $answer->questionId= 2;

        $answer->answer = $_POST['2'];
        $answer->playerId= $_POST['player'];
        $answer->quizId = $_POST['game'];

 	array_push($answers, $answer);

	$factory->set($answers); 
 ?>
 Thank you for playing, <a href="/#!/view1"> Choose your next game or play again</a>
 </body>
</html>
