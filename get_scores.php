<?php

	include "scoresFactory.php";

	$scoresFactory = new MySqlScoreFactory();
        echo json_encode($scoresFactory->get()), PHP_EOL;
?>
