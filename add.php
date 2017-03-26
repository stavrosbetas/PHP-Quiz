<?php include 'database.php'; ?>
<?php
if(isset($_POST['submit'])){
	//Get post variables
	$question_number= $_POST['question_number'];
	$question_text= $_POST['question_text'];
	$correct_choice = $_POST['correct_choice'];

	
	//Choises array
	$choices = array();
	$choices[1]= $_POST['choice1'];
	$choices[2]= $_POST['choice2'];
	$choices[3]= $_POST['choice3'];
	$choices[4]= $_POST['choice4'];
	$choices[5]= $_POST['choice5'];

	// Question query

	$query ="INSERT INTO questions(question_number, test) VALUES('$question_number', '$question_text')";

	// Run it

	$insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

	//Validate the insert

	if($insert_row){
		foreach($choices as $choice => $value){
			if($value != ''){
				if($correct_choice == $choice){
					$is_correct = 1;
				}
				else{
					$is_correct = 0;
				}
				// Choise query
				$query = "INSERT INTO choices(question_number, is_correct, text) VALUES('$question_number', '$is_correct', '$value')";

				//Run the query

				$insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

				//Validate insert

				if($insert_row){
					continue;
				}else{
					die('ERROR : ('.$mysqli->errno.') ' . $mysqli->error);
				}
			}

		}
		$msg = 'Question has been added';

	}
}
/*
	* Get the total number of questions
	*/
	$query = "SELECT * FROM questions ";
	// Get the results

	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total = $result->num_rows;
	$next = $total+1;


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
	<h2>Add a Question</h2>
	<?php
	if(isset($msg)){
		echo '<p>' . $msg . '</p>';
	}
	?>
	<form method="post" action="add.php">
		<p>
			<label>Question Number :</label>
			<input type="number" name="question_number" value="<?php echo $next; ?>"/>
		</p>
		<p>
			<label>Question Text :</label>
			<input type="text" name="question_text" />
		</p>
		<p>
			<label>Question Choise#1 :</label>
			<input type="text" name="choice1" />
		</p>
		<p>
			<label>Question Choise#2 :</label>
			<input type="text" name="choice2" />
		</p>
		<p>
			<label>Question Choise#3 :</label>
			<input type="text" name="choice3" />
		</p>
		<p>
			<label>Question Choise#4 :</label>
			<input type="text" name="choice4" />
		</p>
		<p>
			<label>Question Choise#5 :</label>
			<input type="text" name="choice5" />
		</p>
		<p>
			<label>Correct Choise Number :</label>
			<input type="number" name="correct_choice" />
		</p>
		<input type="submit" name="submit" value="Submit">
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
