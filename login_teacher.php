
<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $fName = $_POST["fName"];
	$lName = $_POST["lName"];
	$email = $_POST["email"];
	 // Connecting to the Database
	 $servername = "localhost:3308";
	 $username = "root";
	 $password = "";
	 $database = "teachers";

	  // Create a connection
	  $conn = mysqli_connect($servername, $username, $password, $database);

	  // Die if connection was not successful
	  if (!$conn){
		  die("Sorry we failed to connect: ". mysqli_connect_error());
	  }
	  else{ 
		$sql = "SELECT * FROM teacher WHERE `fName`='$fName' AND `lName`='$lName' AND `email`='$email'";
		$result = mysqli_query($conn, $sql);
		$num = mysqli_num_rows($result);
	  }
     
    
		if ($num == 1){
			$login = true;
			session_start();
			$_SESSION['loggedin'] = true;
			$_SESSION['fName'] = $fName;
			$_SESSION['lName'] = $lName;
			$_SESSION['email'] = $email;
			header("location: Teacher/teacher_home.php");

		} 
    else{
        echo "<script>alert(\"Invalid Credentials...try again\");</script>";
	}
	if($login){
		echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Success!</strong> You are logged in
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
		</div> ';
		}
}
    
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<title>signin</title>
		<link rel="stylesheet" href="signup_style.css">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
	</head>
	<body>
		<!--form area start-->
		<div class="form">
			<!--login form start-->
			<form class="login-form" action="login_teacher.php" method="post">
				<i class="fas fa-user-circle"></i>
				<input class="user-input" type="text" name="fName" placeholder="First Name" required>
				<input class="user-input" type="text" name="lName" placeholder="Last name" required>
				<input class="user-input" type="email" name="email" placeholder="Email id" required>
				<input class="btn" type="submit" name="login-btn" value="LOGIN">

				<div class="options-02">
					<p>Not Registered? <a href="teacher_registration.php">Create an Account</a></p>
				</div>
			</form>
			<!--login form end-->
		</div>
		<!--form area end-->

	</body>
</html>
