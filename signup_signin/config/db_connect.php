<?php 

	// connect to database
	$conn = mysqli_connect('localhost', 'ryan', 'test1234', 'signup_signin');

	//check connection
	if(!$conn){
		echo "Connection error: " . mysqli_connect_error();
	}

?>