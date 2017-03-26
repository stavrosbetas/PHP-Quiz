<?php
include 'database.php' ;
?>
<?php
	/*
	* Get the total number of questions
	*/
	$query = "SELECT * FROM questions ";
	// Get the results
	
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total = $result->num_rows;
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
<h2>Test your PhP knowledge</h2>
<p>This is a multiple choise quiz to test your knowledge of PHP</p>
<ul>
<li><strong>Number of questions</strong>: <?php echo $total; ?></li>
<li><strong>Type</strong>: Multiple Choice</li>
<li><strong>Estimated Time</strong>: <?php echo $total * .5; ?> Minutes</li>
</ul>
<a href="question.php?n=1" class="start">Star Quiz</a>
</div>
</main>
<footer>
<div class="container">
Copyright &copy; 2017 Plan4web
</div>
</footer>
</body>

</html>