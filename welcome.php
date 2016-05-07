<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<style>
table, th, td {
    border: 1px solid black;
}
</style>

</head>
<body>
<form action="quiz.php" method="post">
<?php
 include 'support.php';
?>

<label for="player">Who are you?</label>
      <select class="form-control" name="player">
	<?php
          players();
	?>
      </select>
<br>
<label for="quiz">Pick Your Game</label>
      <select class="form-control" name="game">
	<?php
          games();
	?>
      </select>
    </ul>
  </div>
</div>

<input type="submit" />
</form>

<br>
<p><b>Leaderboard</b></p>
<?php
	scores();
?>
</body>
</html>


