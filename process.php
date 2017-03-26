<?php include 'database.php'; ?>
<?php session_start(); //Starts a PHP session ?> 
<?php
//Check to see if score is set

if (!isset($_SESSION['score'])){
	$_SESSION['score'] = 0;
}

// On submit we want to know the number and the choise the user made
if($_POST){
	//echo 'I have been submitted';
	$number = $_POST['number'];
	$selected_choice= $_POST['choice'];
	
	//echo $number.'<br>';
	//echo $selected_choise ;
	
	//print_r($_POST); Prints out all the values of the array
	$next= $number+1;
	
	/*
	* Get total number of questions 
	*/
	
	$query = "SELECT * FROM questions ";
	$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total = $results->num_rows;
	
	/*
	* Get correct choise 
	*/
	
	$query = "SELECT * FROM choices WHERE question_number = $number AND is_correct = 1 "; 
	
	/*
	* Get result from query
	*/
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	// Get row
	
	$row = $results->fetch_assoc();
	
	//Set correct choise
	$correct_choice= $row['id'];
	
	//Compare
	if($correct_choice=$selected_choice){
		//Answer is correct
		$_SESSION['score']++ ;
	}
	// Check if is the last question
	if($number == $total){
		header("Location: final.php");
		exit();
	}
	else{
		header("Location: question.php?n=". $next);
	}
	
	
	
	
	
	
	
}




?>