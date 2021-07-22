<?php
include('smtp/PHPMailerAutoload.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>OTP Verification</title>
    <link rel="stylesheet" href="/CSS/VerifyOTP.css">
</head>
<body>
    <div class="navigation">
       <div class="top-right">
            
            <ul>
  				<li><a href="/index.php">Home</a></li>
  				<li><a href="#contact">Contact</a></li>
  				<li><a href="/Rules.html">Rules</a></li>
			</ul>
        </div> 
    </div>
    
    <div class="Form">

    	<header><h1>OTP Verification</h1></header>
        <h4>OTP has been sented to your Email ID</h4>

        <form name="OTPVerification" method="post" action="VerifyOTP.php">
        
        <label for="OTP"><p class="text" style="font-size: 110%;display: inline-block;"> </p></label>
		<input type="text" id="OTP" name="OTP" placeholder="Enter your OTP" ><br>

        <input type="submit" value="Submit" name="submit">

        <?php
		 $conn = mysqli_connect("localhost", "id16328974_root", "Anonymou$9895", "id16328974_bidding_wars");
		if (!$conn) {
			die("Connection Failed:" . mysqli_connect_error());
		} else {
			session_start();
		    $uname = $_SESSION['uname'];
            $email= $_SESSION['email'];
            $pwd= $_SESSION['pwd'];
			$Correctotp = $_SESSION['otp'];
			
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				$otp = mysqli_real_escape_string($conn, $_REQUEST['OTP']);

                if($otp == $Correctotp ){
							$update = "UPDATE registration SET status = 'verified' where email = '$email'";
							if($conn->query($update) === TRUE)
							{
								$log = "INSERT INTO login(email, uname, pwd) VALUES ('$email', '$uname', '$pwd')";
								if ($conn->query($log) === TRUE) {
									$mssg = urldecode("$uname, You have been succesfully registered");
									header("Location:/index.php?Message=".$mssg);
								} 	
								else 
								{
									echo "Error :" . $log . "<br>" . $conn->error;
							}
							}
				}
				else
				{
					echo "<h3>Incorrect OTP</h3>";
				}
				
			}
		}
		?>

        </form>
    </div>

    </body>
</html>