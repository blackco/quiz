<?php

function getXml($filename){
	
 if (file_exists($filename)) {
    $xml = simplexml_load_file($filename);
  } else {
    $xml = ''; 
 }
 return $xml;
}

function options($filename){
 $xml = getXml($filename);
 foreach ($xml->item as $item){
        echo '<option value="',$item->id, '">',$item->name,'</option>';
 }
}

function players(){
 $xml = getXml('players.xml');
 foreach ($xml->player as $player){
	echo '<option value="',$player->id, '">',$player->name,'</option>';
 }
}

function games(){
 
 $xml = getXml('games.xml');
 foreach ($xml->game as $game){
        echo '<option value="',$game->id, '">',$game->name,'</option>';
 }

}

function scores(){

  echo '<table style="width:100%">';
  echo '<th>Player</th>';
  echo '<th>Score</th>';

	$games = getXml('games.xml');
	$players = getXml('players.xml');
	

   
   foreach ( $players->player as $player){
 	$score = 0;
	
	foreach ($games->game as $game){
		
   		$score=$score + getScore($player->id . '_' . $game->id);	
 	}
	echo '<tr>';
	echo '<td>', $player->name , '</td>';
	echo '<td>', $score , '</td>';
	echo '</tr>';
   }
 echo '</table>';
}

function getScore($filename){
 
	$score=0;

	if (file_exists($filename)) {
		
	$lines = file($filename);
	foreach( $lines as $line_num => $line ){

		$items  = explode('|', $line);
		if ( $items[0] == "Score" ){
        		$score=$score + $items[1];
		}
	}
	}

	return $score;

		
}

?>
