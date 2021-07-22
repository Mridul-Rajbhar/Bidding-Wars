<?php
include('smtp/PHPMailerAutoload.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Sign Up Page</title>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://biddingwars.tk/CSS/SignUp.css">
   
</head>
<body>
    <div class="nav">
       <div class="top">
            
            <ul>
                <li style="float: right;"><a href="http://biddingwars.tk/Rules.html">Rules</a></li>
                <li style="float: right;"><a href="http://biddingwars.tk/Contact.php">Contact</a></li>
                <li style="float: right;"><a href="http://biddingwars.tk/">Home</a></li>
                <list style="float: left;"><a href="http://biddingwars.tk/"><img src="http://biddingwars.tk/CSS/logo.jpg" height="60px"></a></list>
			</ul>
        </div> 
    </div>

    <wrapper><div id="Home">
        <p1>Welcome  to</p1>
         <p2>&nbsp;Bidding Wars</p2>
          <br />
         <p3>Here You can</p3>
          <b>
           <span1>
            &nbsp;Sell<br /> 
            &nbsp;Buy<br />
            &nbsp;Join Bid<br />
           </span1>
          </b>
        <span2></span2>
          </div>
        </wrapper>

    <div class="Form">
    	<header><h1>Sign Up</h1></header>
        <form name="SignUpForm" onsubmit="return validateForm()" method="post" action="SignUp.php">
            
        <?php
        session_start();
        $conn = mysqli_connect("localhost", "id16328974_root", "Anonymou$9895", "id16328974_bidding_wars");
		if (!$conn) {
			die("Connection Failed:" . mysqli_connect_error());
		} else {
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                session_start();
                $uname = mysqli_real_escape_string($conn, $_REQUEST['uname']);
                $fname = mysqli_real_escape_string($conn, $_REQUEST['fname']);
                $mname = mysqli_real_escape_string($conn, $_REQUEST['mname']);
                $lname = mysqli_real_escape_string($conn, $_REQUEST['lname']);
                $dob = mysqli_real_escape_string($conn, $_REQUEST['dob']);
                $gender = mysqli_real_escape_string($conn, $_REQUEST['gender']);
                $room_no = mysqli_real_escape_string($conn, $_REQUEST['room_no']);
                $locality = mysqli_real_escape_string($conn, $_REQUEST['locality']);
                $station = mysqli_real_escape_string($conn, $_REQUEST['station']);
                $pincode = mysqli_real_escape_string($conn, $_REQUEST['pincode']);
                $state = mysqli_real_escape_string($conn, $_REQUEST['state']);
                $phone = mysqli_real_escape_string($conn, $_REQUEST['phone']);
                $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
                $pwd = mysqli_real_escape_string($conn, $_REQUEST['pwd']);
                $otp = mt_rand(100000, 999999);
                $status = "pending";
				
				$_SESSION['uname'] = $uname;
				$_SESSION['email'] = $email;
                $_SESSION['pwd'] = $pwd;
				$_SESSION['otp']= $otp;
				
                $subject = "OTP Verification";
                $body = "$uname,Welcome to Bidding Wars. Your OTP for registration is, $otp";
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
							echo "<script>window.location.href='VerifyOTP.php'</script>";
						}
					}

                $emailquery = "SELECT *FROM registration where email = '$email' ";
                $query = mysqli_query($conn, $emailquery);
                $emailcount = mysqli_num_rows($query);
    
                if ($emailcount > 0) {
                    echo "<br><h3>Email ID is already Registered</h3>";
                } else {
                    $userquery = "SELECT *FROM registration where uname = '$uname' ";
                    $uquery = mysqli_query($conn, $userquery);
                    $usercount = mysqli_num_rows($uquery);
                    if ($usercount > 0) {
                        echo "<br><h3>Username is already Taken</h3>";
                    }else{
					   $sql="INSERT into registration values ('$uname', '$fname', '$mname', '$lname', '$dob', '$gender', '$room_no', '$locality', '$station', '$pincode', '$state', '$phone', '$email', '$pwd', '$status')";
                       echo smtp_mailer($email,$subject,$body);
                        if ($conn->query($sql) === TRUE) {
							echo "<script>window.location.href='VerifyOTP.php'</script>";
                        }  
                    }
                }
            }
        }
    ?>

            <label for="uname"><p class="text" style="font-size: 110%;display: inline-block;"></p></label>
            <input type="text" id="uname" name="uname" placeholder="Username"><p class="err_msg" style="font-size:80%" id="uname_info" ></p>
            
            <label for="fname"><p class="text" style="font-size: 110%;display: inline-block;"></p></label>
            <input type="text" id="fname" name="fname" placeholder="First Name"><p class="err_msg" style="font-size:80%" id="fname_info" ></p>
            
            <label for="mname"><p class="text" style="font-size: 110%;display: inline-block;"></p></label>
            <input type="text" id="mname" name="mname" placeholder="Middle Name"><p class="err_msg" style="font-size:80%" id="mname_info" ></p>
            
            <label for="lname"><p class="text" style="font-size: 110%;display: inline-block;"></p></label>
            <input type="text" id="lname" name="lname" placeholder="Last Name"><p class="err_msg" style="font-size:80%" id="lname_info" ></p>
            
            <label for="dob"><p class="text" style="font-size: 110%;display: inline-block;">Date of Birth:</p></label>
            <input type="date" id="datemax" name="dob" placeholder="Date of Birth" max="2002-01-01">
            <p class="err_msg" style="font-size:80%" id="dob_info" ></p>
            
            <label for="gender"><p class="text" style="font-size: 110%;display: inline-block;">Gender: </p></label>
			<select id="gender" name="gender">
			    <option value="Select">Select</option>
				<option value="M">Male</option>
				<option value="F">Female</option>
				<option value="O">Prefer Not To say</option>
			</select>
            <p class="err_msg" style="font-size:80%" id="gender_info"> </p>
            
            
            <label for="room_no"><p class="text" style="font-size: 110%;display: inline-block;"></p></label>
		    <input type="text" id="room_no" name="room_no" placeholder="Room No." >
            <p class="err_msg" style="font-size:80%" id="room_no_info"> </p>
            

            <label for="locality"><p class="text" style="font-size: 110%;display: inline-block;"></p></label>
		    <input type="text" id="locality" name="locality" placeholder="Locality" >
            <p class="err_msg" style="font-size:80%" id="locality_info"> </p>
            
            
            <label for="station"><p class="text" style="font-size: 110%;display: inline-block;"></p></label>
		    <input type="text" id="station" name="station" placeholder="Station" >
            <p class="err_msg" style="font-size:80%" id="station_info"> </p>
            
            
            <label for="pincode"><p class="text" style="font-size: 110%;display: inline-block;"> </p></label>
		    <input type="text" id="pincode" name="pincode" placeholder="Pincode" >
            <p class="err_msg" style="font-size:80%" id="pincode_info"> </p>
            
            
            <label for="state"><p class="text" style="font-size: 110%;display: inline-block;">State: </p></label>
            <select id="state" name="state">
                <option value="Select">Select</option>
                <option value="Andra Pradesh">Andhra Pradesh</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                <option value="Assam">Assam</option>
                <option value="Bihar">Bihar</option>
                <option value="Chattisgarh">Chhattisgarh</option>
                <option value="Delhi">Delhi</option>
                <option value="Goa">Goa</option>
                <option value="Gujurat">Gujurat</option>
                <option value="Haryana">Haryana</option>
                <option value="Himachal Pradesh">Himachal Pradesh</option>
                <option value="Jharkhand">Jharkhand</option>
                <option value="Jammu and Kashmir">Jammu & Kashmir</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Kerela">Kerela</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Manipur">Manipur</option>
                <option value="Meghalaya">Meghalaya</option>
                <option value="Mizoram">Mizoram</option>
                <option value="Nagaland">Nagaland</option>
                <option value="Odisha">Odisha</option>
                <option value="Punjab">Punjab</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="Sikkim">Sikkim</option>
                <option value="Tamil Nadu">Tamil Nadu</option>
                <option value="Telengana">Telengana</option>
                <option value="Tripura">Tripura</option>
                <option value="Uttarakhand">Uttarakhand</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="West Bengal">West Bengal</option>	
            </select>
            <p class="err_msg" style="font-size:80%" id="state_info"> </p>
            
            
            <label for="phone"><p class="text" style="font-size: 110%;display: inline-block;"></p></label>
	        <input type="text" id="phone" name="phone" placeholder="Phone Number" >
            <p class="err_msg" style="font-size:80%" id="phone_info"> </p>
            
            
            <label for="email"><p class="text" style="font-size: 110%;display: inline-block;"></p></label>
	        <input type="email" id="email" name="email" placeholder="Email ID" >
            <p class="err_msg" style="font-size:80%" id="email_info"> </p>
            <br>
            
            <label for="password"><p class="text" style="font-size: 110%;display: inline-block;"></p></label>
	        <input type="text" id="pwd" name="pwd" placeholder="Password" >
            <p class="err_msg" style="font-size:80%" id="pwd_info"> </p>
            <br>
            
            <input type="submit" value="Submit" name="submit">
        </form>

    </div>
    
    <script src="http://biddingwars.tk/JavaScript/SignUp.js"></script>
</body>
</html>