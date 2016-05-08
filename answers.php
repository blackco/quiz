<html>
 <head>
  <title>Your submission</title>
 </head>
 <body>
 <br>

 <?php

  include 'support.php';

  $username = $_POST['player'];
  $questions = $_POST['game'];

  $score  = 0;
  $number = 1;

  $xml = getXml($questions . '.xml');

  if( $username != null )
  {
    echo( "Thanks for you for playing $questions, $username <hr>" );
    $file = scoresFilename($username , $questions);;
  } else {
	echo 'cannot submit without nominating a player!';
	exit ( 'No player nominated');
  }

  $contents = "";

  file_put_contents($file, $contents,LOCK_EX );

  foreach ( $xml->question as $question){

	if ( $question->answer == $_POST[$number] ){
		$score = $score + 1;
	}

 	file_put_contents($file, $number . '|' . $_POST[$number] .'|' . PHP_EOL , FILE_APPEND | LOCK_EX);
        $number = $number + 1;
  }

  echo  "<br> <b>Your Score is</b> " , $score ; 
	
  $contents = 'Score|' . $score . PHP_EOL;

  file_put_contents($file, $contents, FILE_APPEND | LOCK_EX);
 ?>
 <a href="welcome.php"> The Leaderboard</a>
 </body>
</html>
