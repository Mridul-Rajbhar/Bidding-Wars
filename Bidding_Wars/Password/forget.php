<?php
include('smtp/PHPMailerAutoload.php');
?>
<!DOCTYPE html>
<html>

	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>Forgot Password</title>
        <link rel="stylesheet" href="/CSS/reset.css">
	</head>

<body>

	
            
                <ul>
                    <li><a href="http://biddingwars.tk">Home</a></li>
                    <li><a href="http://biddingwars.tk/Contact.php">Contact</a></li>
                    <li><a href="http://biddingwars.tk/Rules.html">Rules</a></li>
              </ul>   
             
	
<br>
<div class="text">

</div>
<br><br><br><br>

<h1>Forgot Password</h1>
<div class="Form">
<form action="" method="post">
<p>Enter your Registered Email ID</p>
<input type="email" placeholder="Email ID" name="email" id="email" required><br><br>
<input type="submit" value="Reset Your Password" name="reset"><br><br>
</form>

<?php
$conn = mysqli_connect("localhost", "id16328974_root", "Anonymou$9895", "id16328974_bidding_wars");
if(! $conn)
{
	die("Connection Failed:".mysqli_connect_error());
}

else
{
	if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$email = mysqli_real_escape_string($conn,$_REQUEST['email']);

    $subject = "Reset Your Password";
    $body = "Click on this link to reset your Password. http://biddingwars.tk/Password/reset.php";
    function smtp_mailer($email,$subject, $body)
					{
						$mail = new PHPMailer(); 
						$mail->SMTPDebug  = 3;
						$mail->IsSMTP(); 
						$mail->SMTPAuth = true; 
						$mail->SMTPSecure = 'tls'; 
						$mail->Host = "smtp.gmail.com";
						$mail->Port = 587; 
						$mail->IsHTML(true);
						$mail->CharSet = 'UTF-8';
						$mail->Username = "biddingwars.tk@gmail.com";
						$mail->Password = "June@2218";
						$mail->SetFrom("biddingwars.tk@gmail.com");
						$mail->Subject = $subject;
						$mail->Body = $body;
						$mail->AddAddress($email);
						$mail->SMTPOptions=array('ssl'=>array
						(
							'verify_peer'=>false,
							'verify_peer_name'=>false,
							'allow_self_signed'=>false
						));
						if(!$mail->Send())
						{
							echo $mail->ErrorInfo;
						}
						else
						{
							$mssg = urldecode("Reset Password Link has been Sent to your Registered Email ID");
                            header("Location:/index.php?Message=".$mssg);
						}
					}
    
	$emailquery = "SELECT *FROM registration where email = '$email' ";
	$query = mysqli_query($conn,$emailquery);
	
	$emailcount = mysqli_num_rows($query);
		if($emailcount)
		{
					echo smtp_mailer($email,$subject,$body);
		}
		else
		{
			echo '<h3>Email ID not registered</h3>';
		}
	
}
}
//Close Connectiom
mysqli_close($conn);
?>

</div>

</body>
</html>