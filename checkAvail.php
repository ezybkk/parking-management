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
			</ul>
			</div>
		</header>
		<div class="content">	
		<?php
			include("config.php");
			//fetching data in descending order (latest entry first)
			$result = mysqli_query($cser, "SELECT * FROM parkingSlot ORDER BY slot_number ASC"); // using mysqli_query instead

		?>
		</div>
		<div class="table-slot">
			<table>
				<tr>
					<th>Slot</th>
					<th>Status</th>
					<th></th>
				</tr>
				<tr>
					<?php 
					while($res = mysqli_fetch_array($result)){
						echo "<tr>";
						echo "<td>".$res['slot_number']."</td>";
						echo "<td>".$res['availability']."</td>";
						if($res['availability']=='Available'){
							echo "<td><a href=book.php?slot=".$res['slot_number']." class='btn2'>BOOK</a></td>";
						} 
						else{
							echo "<td><a href='javascript:void()' class='btn2'>BOOK</a></td>";
						}
					}
					 ?>
				</tr>
		</div>
			</table>
			<br>
			<a href="map.php" class="btn2">View Floor Map</a>

</body>
</html>