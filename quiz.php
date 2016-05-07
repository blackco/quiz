<html>
 <head>
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
 
$checkedA = " checked";

echo '<input type="hidden" name="game" value="',$quiz,'" />';
echo '<input type="hidden" name="player" value="',$user,'" />';

foreach ( $xml->question as $question){

	if ( $question->type == "Photo" ){
	    echo '<img src=', $question->photo ,' height="100" width="100"><br>', PHP_EOL;
	}
	echo '<b>Question [', $number, ']</b> ' ;
	echo '<b>',$question->question, '</b><br>',PHP_EOL;
	echo '<input type=radio name="', $number ,'" value="', $question->answerA, '" ',  $checkedA,'>', $question->answerA,'<br>', PHP_EOL;
        echo '<input type=radio name="', $number ,'" value="', $question->answerB, $checkedB, '">', $question->answerB,'<br>', PHP_EOL;
        echo '<input type=radio name="', $number ,'" value="', $question->answerC, $checkedC, '">', $question->answerC,'<br>', PHP_EOL;

	$number = $number +1; 
}
?>
<input type="submit" value="Submit">
</form>
</body>
</html>
