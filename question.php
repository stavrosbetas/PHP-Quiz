<?php include 'database.php';?>
<?php session_start(); ?>
<?php
	// Set Question number
	$number = (int) $_GET['n'];
	
	/*
	* Get Question
	*/
	
	$query = "SELECT * FROM questions WHERE question_number  = $number " ;
	
	// Get the results
	
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$question = $result->fetch_assoc(); // this is going to give us an associative array with the data that we requested.
	//Φτιάξαμε τον πίνακα με τα data που έχουμε δώσει στην βάση μας και μπορούμε να τα αξιοποιήσουμε πλέον και όλα έχουν αποθηκευτεί στην μεταβλητή $query.
	
	
	/*
	* Get Choises
	*/
	
	$query = "SELECT * FROM choices WHERE question_number  = $number " ;
	
	// Get the results
	
	$choices = $mysqli->query($query) or die($mysqli->error.__LINE__);
	
	/*
	* Get total number of questions 
	*/
	
	$query = "SELECT * FROM questions";
	$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total = $results->num_rows;
	
	
?>

<!DOCTYPE html>
<html>
<head>
<title>PhP Quizzer</title>
<meta charset="utf-8"/>
<link type="text/css" rel="stylesheet" href="css/style.css">
</head>

<body>
<header>
<div class="container">
<h1>PhP Quizzer</h1>

</div>

</header>
<main>
<div class="container">
	<div class="current"> Question <?php echo $question['question_number']; ?> of <?php echo $total; ?></div>
	<p class="question">
		<?php echo $question['test']; //It echos the question from database from column test ?> 
	</p>
	<form method="post" action="process.php">
	<ul class="choices">
		<?php while($row = $choices->fetch_assoc()) : ?>
				<li><input name="choice" type="radio" value="<?php echo $row['id']; ?>"/><?php echo $row['text'];?></li>
		<?php endwhile?>
	</ul>
	<input type="submit" value="submit">
	<input type="hidden" name="number" value="<?php echo $number; ?>" />
	
	</form>
</div>
</main>
<footer>
<div class="container">
Copyright &copy; 2017 Plan4web
</div>
</footer>
</body>

</html>