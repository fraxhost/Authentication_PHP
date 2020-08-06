<?php 
	
	include('config/db_connect.php');

	$username = $password = $repassword = '';

	$errors = array('username' => '', 'password' => '', 'repassword' => '');

	if(isset($_POST['signup'])){

		if(empty($_POST['username'])){
			$errors['username'] = 'A username is required <br/>';
		}
		else{
			$username = $_POST['username'];
		}

		if(empty($_POST['password'])){
			$errors['password'] = 'A password is required <br/>';
		}
		else{
			$password = $_POST['password'];
		}

		if(empty($_POST['repassword'])){
			$errors['repassword'] = 'A password is required <br/>';
		}
		else{
			$repassword = $_POST['repassword'];
			if ($password !== $repassword) {
				$errors['repassword'] = 'Passwords do not match!';
			}
		}

		if(array_filter($errors)){
			// echo 'errors in the form'
		}		
		else{
			$username = mysqli_real_escape_string($conn, $_POST['username']);
			$password = mysqli_real_escape_string($conn, $_POST['password']);

			// create SQL
			$sql = "INSERT INTO user(username, password) VALUES('$username', '$password')";

			// make query and get result
			if (mysqli_query($conn, $sql)){
				// success
				echo "query success";
				header('Location: signin.php');
			} else {
				// error
				echo 'query error: ' . mysqli_error($conn);
			}

			// echo 'form is valid';
			header('Location: signin.php');

		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>sign up</title>
</head>
<body>

	<?php include 'template/header.php'?>

	<form action="signup.php" method="POST">
		<label>Username: </label>
		<input type="text" name="username" value="<?php echo htmlspecialchars($username) ?>">
		<div class="red-text text-darken-2">
			<?php echo $errors['username']?>
		</div>
		<label>Password: </label>
		<input type="password" name="password">
		<div class="red-text text-darken-2">
			<?php echo $errors['password']?>
		</div>
		<label>Retype Password: </label>
		<input type="password" name="repassword">
		<div class="red-text text-darken-2">
			<?php echo $errors['repassword']?>
		</div>
		<div>
			<input type="submit" name="signup" value="signup">
		</div>
	</form>
</body>
</html>