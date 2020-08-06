<?php  

	session_start();

	if(isset($_SESSION['loggedIn'])){
		//echo "Welcome, " . $_SESSION['username'];
	}
	else{
		header("Location: signin.php");
	}	

	session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<title>homepage</title>
</head>
<body>
	<?php include 'template/header.php'?>

	<div class="row ">
    <div class="col s6 offset-s3">
      <div class="card blue-grey darken-1 ">
        <div class="card-content white-text">
          <span class="card-title">Home Page</span>
          <h6>
          	Welcome,
          	<?php 
          		echo $_SESSION['username'];
          	?>
          </h6>
        </div>
      </div>
    </div>
  </div>

</body>
</html>