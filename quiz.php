<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <title>Quiz</title>
 </head>

 <body>

  <form action="answers.php" method="post">
<?php
 include 'support.php';

	$user = $_POST['player'];
	$quiz = $_POST['game'] ;

echo 'Good Luck ', $user, '<br>';
echo 'Questions<br>', PHP_EOL;

$xml = getXml($quiz.'.xml');

$number = "1";
 
$playerAnswers = getPlayerAnswers($user,$quiz);

echo '<input type="hidden" name="game" value="',$quiz,'" />';
echo '<input type="hidden" name="player" value="',$user,'" />';

function radioButtons($questionNo, $answerVal , $checked){
	echo '<div class="radio"><label>';
        echo '<input type=radio name="', $questionNo ,'" value="', $answerVal, '" ',  $checked,'>', $answerVal;
        echo '</label></div>';
}

foreach ( $xml->question as $question){

	$checkedA = '';
	$checkedB = '';
	$checkedC = '';

	if ( $question->answerA == $playerAnswers[$number]){
		$checkedA = " checked";
	} else if ( $question->answerB == $playerAnswers[$number]){
                $checkedB = " checked";
        } else if ( $question->answerC == $playerAnswers[$number]){
                $checkedC = " checked";
	}


	if ( $question->type == "Photo" ){
	    echo '<img src="', $question->photo ,'" class="img-circle" height="200" width="236"><br>', PHP_EOL;

	}
	echo '<b>Question [', $number, ']</b> ' ;
	echo '<b>',$question->question, '</b><br>',PHP_EOL;


	radioButtons($number, $question->answerA , $checkedA);
	radioButtons($number, $question->answerB , $checkedB);
	radioButtons($number, $question->answerC , $checkedC);
	
	echo '<br>';
	$number = $number +1; 
}
?>
<input type="submit" value="Submit">
</form>
</body>
</html>
