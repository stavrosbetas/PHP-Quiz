<?php session_start(); ?>

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
	<h2>You are Done</h2>
	<p>Gongrats! You have finished the test!</p>
	<p>Final score: <?php echo $_SESSION['score']; ?></p>
	<a href="question.php?n=1" class="start">Take Again</a>
</div>
</main>
<footer>
<div class="container">
Copyright &copy; 2017 Plan4web
</div>
</footer>
</body>

</html>