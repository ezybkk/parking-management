<?php 
	include("config.php");

	if(isset($_POST['submit'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	$sql="SELECT * FROM user WHERE username = '$username' AND password = '$password'";
	$result=mysqli_query($cser,$sql);
	$row=mysqli_fetch_array($result);
	if($username==""&&$password==""){
		//header('location:login.html');
	}
	else if($row['username']==$username && $row['password']==$password){
		header('location:update.php');
	}
	else{
		echo "<script>alert('Invalid Username/Password')</script>";
	 	echo "<script>location.replace('login.php')</script>";
	}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PARKING MANAGEMENT</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<div class="LogInmodal">
		<div class="LogIncontent">
			<img src="image/newlogo.png" alt="">
			<header>Operator</header>
			<form method="post" class="box1" action="login.php" >
				<input type="text" name="username" placeholder="USERNAME" required >
				<input type="password" name="password" placeholder="PASSWORD" required>
				<br>
				<input type="submit" name="submit" value="Login">
			
			</form>
			<br>
			<br>
			<a href="index.php" class="goBack">&#x2190 Go Back</a>
		</div>

	</div>
</body>
</html>



<?php
	// include("config.php");
	// session_start();

	// if($_SERVER["REQUEST_METHOD"] == "POST"){
	// 	$username = mysqli_real_escape_string($cser, $_POST['username']);
	// 	$password = mysqli_real_escape_string($cser, $_POST['password']);

	// 	$sql = "SELECT * FRON user WHERE username = '$username' AND password = '$password'";
	// 	$result = mysqli_query($cser, $sql);
	// 	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	// 	$active = $row['active'];

	// 	$count = mysqli_num_rows($result);
	
	// 	if($count == 1){
	// 		session_register("username");
	// 		$_SESSION['login_user'] = $username;
	// 		header("location: update.php");
	// 	}
	// 	else{
	// 		$error = "Your Login Name or Password is invalid.";
	// 	}

	// }	
?>




<!-- <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-=device-width, initial-scale=1">
	<title>Brodev Parking Management</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<div class="main">
			<div class="logo">
				<img src="image/newlogo.png">
			</div>
		</div>
	</header>
	<div class="center">
		<h1>Login</h1>
		<form method="POST" action="update.php">
			<div class="txt-field">
				<input type="text" name="username" required>
				<span></span>
				<label>Username</label>
			</div>
			<div class="txt-field">
				<input type="password" name="password" required>
				<span></span>
				<label>Password</label>
			</div>
			<input type="submit" value="Login">
			<a href="index.php" class="btn1">Back</a>
		</form>
	
</body>
</html> -->
