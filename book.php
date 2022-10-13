<!DOCTYPE html>
<html>
<head>
	<title>Brodev Parking Management</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<?php
		include('config.php');
		if(count($_POST)>0){
			$slotFin = $_POST['slot'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$time = $_POST['time'];
			
			mysqli_query($cser, "UPDATE parkingSlot SET availability='Occupied', firstName='$name', userEmail='$email', time='$time' WHERE slot_number='$slotFin'");
			$message = "Updated!";
			header("Location:http://localhost/sample/confirm.php");
		}
	?>

	<!-- <div id="myModal" class="modal">
		<div class="modal-content">
			<span class="close">&times;</span>
			<p>Some text in the Modal..</p>
		</div>
	</div> -->
	<script src="script.js"></script>
    <?php
    $slot = $_GET['slot'];
    //confirm if slot number is passed successfully
 //   echo "Slot: ".$slot." ";
    ?>
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
		</header>
            <form action="" method="post" class="book-content">
                <p><label for="user" class="lbl">Please input your name:</label>
                <input type="text" name="name" id="user"><br><br></p>
                <p><label for="email" class="lbl">Please input your email:</label>
                <input required type="text" name="email" id="email" placeholder="denver@example.com"></p><br><br>
                <input type="hidden" name="slot" value="<?php echo "".$slot."" ?>">
				<p><label for="user" class="lbl">Input your desired time for parking:</label>
                <input type="datetime-local" name="time" id="time"><br><br></p>
                <p><a href="confirm.php"><input type="submit" name="submit" value="submit"></input></a><br><br>
                <!-- <a href="confirm.php?slot=<?php echo "".$slot."" ?>" class="btn2">Submit</a><br><br> -->
                <a href="checkAvail.php" class="btn2">BACK</a>
            </form>

</body>
</html>
