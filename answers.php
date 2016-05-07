<html>
 <head>
  <title>Your submission</title>
 </head>
 <body>
 <br>

 <?php
  $username = $_POST['player'];
  $questions = $_POST['game'];

  $score  = 0;
  $number = 1;

  if (file_exists($questions . '.xml')) {
    	
	$xml = simplexml_load_file($questions . '.xml');
 
   } else {    

	echo 'cannot find ' , $questions, '.xml',PHP_EOL;
    	exit('Failed to open answers.');
   }

  if( $username != null )
  {
    echo( "Thanks for you for playing $game, $username <hr>" );
    $file = $username;
  } else {
	echo 'cannot submit without nominating a player!';
	exit ( 'No player nominated');
  }

  $contents = "";

  file_put_contents($file, $contents,LOCK_EX );

  foreach ( $xml->question as $question){

	/*
	echo $number, '] ', $question->answer, ' == ' , $_POST[$number], ( $question->answer == $_POST[$number] );
	echo '<br>';
	*/
	if ( $question->answer == $_POST[$number] ){
		$score = $score + 1;
	}

 	file_put_contents($file, $number . '|' . $_POST[$number] . PHP_EOL, FILE_APPEND | LOCK_EX);
        $number = $number + 1;
  }

  echo  "<br> <b>Your Score is</b> " , $score ; 
	
  $file = $username;
  $contents = 'Score|' . $number . PHP_EOL;

  file_put_contents($file, $contents, FILE_APPEND | LOCK_EX);
 ?>

 </body>
</html>
