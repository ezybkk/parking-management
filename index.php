<!DOCTYPE html>
<html>
<head>
	<title>Brodev Parking Management</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<div class="main">
			<div class="logo">
				<img src="image/newlogo.png">
			</div>
			<ul>
				<li class="active"><a href="index.php">HOME</a></li>
				<li><a href="about.php">ABOUT</a></li>
				<li><a href="contact.php">CONTACT US</a></li>
				<li><a href="location.php">LOCATION</a></li>
			</ul>
			</div>
		<div class="title">
			<h1>Welcome to Brodev Parking Management</h1>
		</div>
		<div class="button">
			<a href="login.php" class="btn">Login as operator</a>
			<a href="checkAvail.php" class="btn">Check available slot</a>
		</div>
	</header>

	<?php
		date_default_timezone_set('Asia/Manila');
		//echo "Current timezone: ".date_default_timezone_get()."</br> Current time: ".date("d-m-Y H:i:s");
		
		$datetime = new DateTime('2022-10-12 23:00:00');
		$currentDate = new DateTime('now');
		$interval = $datetime->diff($currentDate);
		$diff = $interval->format("%h:%i");
		$elapsed = $interval->format('%y years %m months %a days %h hours %i minutes %s seconds');
		echo $elapsed;
		echo $diff;

	?>

</body>
</html>
