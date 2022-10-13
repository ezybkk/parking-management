<!DOCTYPE html>
<html>
<head>
	<title>Brodev Parking Management</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
        .invoice-box{
        max-width: 800px;
	    margin: auto;
	    padding: 30px;
    	border: 1px solid #000;
    	box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
    	font-size: 16px;
    	line-height: 55px;
    	font-family: Arial, sans-serif;
        position: absolute;
        top: 600px;
        left: -100px;
        color: #fff; 
        }    
        
    </style>

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
        <?php

        function computeAmount($hour,$minute){
            $amount = 0;
            
            if($hour <= 3){
                $amount += 50;
            } else{
                if($minute == 0){
                    // $hour -= 3;
                    // $amount = 50 + ($hour * 5);
                    $hour -= 3;
                    $amount = 50 + ($hour * 5);
                }else{
                    $hour -= 2;
                    $amount = 50 + ($hour * 5);

                }
            }

            return $amount;

        }

        date_default_timezone_set('Asia/Manila');
        include('config.php');
        $slot = $_GET['slot'];
        $result = mysqli_query($cser, "SELECT * FROM parkingslot WHERE slot_number=$slot");
        $res = $result->fetch_assoc();

        $currentTime = new datetime('now');
        $timeIn = new DateTime($res['time']);
        $diff = $timeIn->diff($currentTime);
        $hour = $diff->format("%h");
        $minute = $diff->format("%i");

        $total =& computeAmount($hour, $minute);

        if(count($_POST)>0){
            mysqli_query($cser, "UPDATE parkingSlot SET availability = 'Available', firstName = '', userEmail = '', time = '' WHERE slot_number = $slot");
            header("Location:http://localhost/sample/update.php");
        }

        ?>
        <form action="" method="post">
		<div class = "invoice-box">
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td>
                                    <h4>Parking Invoice</h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Name: 
                                </td>
                                <td>
                                    <?php echo "".$res['firstName']."" ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Email: 
                                </td>
                                <td>
                                <?php echo "".$res['userEmail']."" ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Time-In: 
                                </td>
                                <td>
                                <?php echo $timeIn->format('Y-m-d h:i:s'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Amount:  
                                </td>
                                <td>
                                    <?php echo $total; ?>
                                    <input type="hidden" name="slot" value="<?php echo "".$slot."" ?>">
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table>
            <input type="submit" name="submit" value="submit" class="btn3"></input> <a href="update.php" class="btn2">BACK</a>
         </form>
		
</body>
</html>
