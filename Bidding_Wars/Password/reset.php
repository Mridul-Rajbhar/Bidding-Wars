<!DOCTYPE html>
<html>
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>Reset Password</title>
        <link rel="stylesheet" href="/CSS/forget.css">
	</head>
<body>

	<div class="sub">
            
                <ul>
                    <li><a href="http://biddingwars.tk">Home</a></li>
                    <li><a href="http://biddingwars.tk/Contact.php">Contact</a></li>
                    <li><a href="http://biddingwars.tk/Rules.html">Rules</a></li>
              </ul>  
	</div>        
	<br>
	<div class="text">
		<?php
		$conn = mysqli_connect("localhost", "id16328974_root", "Anonymou$9895", "id16328974_bidding_wars");
		if (!$conn) {
			die("Connection Failed:" . mysqli_connect_error());
		} else {
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$username = mysqli_real_escape_string($conn, $_REQUEST['username']);
				$pwd = mysqli_real_escape_string($conn, $_REQUEST['password']);
				$cpwd = mysqli_real_escape_string($conn, $_REQUEST['cpassword']);

				$userquery = "SELECT *FROM registration where uname = '$username' ";
				$query = mysqli_query($conn, $userquery);
				$usercount = mysqli_num_rows($query);
				
				if ($usercount) {
					if ($pwd == $cpwd) {
						$pquery = "UPDATE registration SET pwd = '$pwd' where uname = '$username'";
						if ($conn->query($pquery) === TRUE) {
							$log = " UPDATE login SET pwd = '$pwd' where uname = '$username'";
                            
							if ($conn->query($log) === TRUE) {
							    
								$mssg = urldecode("$username, Your password has been reset succesfully");
								header("Location:/index.php?Message=".$mssg);
							} else {
								echo "Error :" . $log . "<br>" . $conn->error;
							}
						} else {
							echo "Error :" . $pquery . "<br>" . $conn->error;
						}
					} else {
						echo "<h3>Password does not match</h3>";
					}
				} else {
					echo "<h3>$username is invalid</h3>";
				}
			}
		}
		?></div>
		
		<br>
		
			<h1>Reset Your Password</h1>
			
			<div class="Form">
			<form action="" method="post">
				
				<input type="text" placeholder="Enter Username" name="username" id="username" required>
				<br><br>
				<input type="password" placeholder="Enter New Password" name="password" id="password" required>
				<br>
				<input type="password" placeholder="Confirm New Password" name="cpassword" id="cpassword" required><br>
				
				<input type="submit" value="Reset" name="reset"><br><br>
			</form>
			</div>
	
</body>

</html>