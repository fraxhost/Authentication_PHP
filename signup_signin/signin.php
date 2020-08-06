<?php
	
	include('config/db_connect.php');

	$username = $password = '';

	if(isset($_POST['signin']))
	{
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);

		// create query
		$sql = "SELECT COUNT(*) FROM user WHERE username='$username' AND password = '$password'";

		// make query and get result 
		$result = mysqli_query($conn, $sql);
		$count = mysqli_fetch_assoc($result)['COUNT(*)'];

		if ($result){ 

			if($count){
				echo 'data found';

				session_start();
				$_SESSION['loggedIn'] = true;
				$_SESSION['username'] = $username;

				header('Location: home.php');
			}else{
				echo 'User not found';
			}

		} else {
			// error
			echo 'query error: ' . mysqli_error($conn);
		}

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>sign in</title>
</head>
<body>
	<?php include 'template/header.php'?>

	<form action="signin.php" method="POST">
		<label>Username: </label>
		<input type="text" name="username" value="<?php echo htmlspecialchars($username) ?>">
		
		<label>Password: </label>
		<input type="password" name="password">
		
		<div>
			<input type="submit" name="signin" value="signin">
		</div>
	</form>
</body>
</html>