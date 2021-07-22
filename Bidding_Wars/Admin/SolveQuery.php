<?php
include('smtp/PHPMailerAutoload.php');
$conn = mysqli_connect("localhost", "id16328974_root", "Anonymou$9895", "id16328974_bidding_wars");
if (!$conn) {
    die("Connection Failed:" . mysqli_connect_error());
} else { 
        session_start();
        $queries = $_GET['queries'];
        $email = $_GET['email'];
        $sr_no = $_GET['id'];
                $subject = "Query Reply";
                function smtp_mailer($email,$subject, $queries)
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
						$mail->Body = $queries;
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
						    echo "<script>window.location.href='http://biddingwars.tk/Admin/Queries.php'</script>";
						}
					}
        $delete = "DELETE FROM contact where Sr_No = '$sr_no' ";
        if($conn->query($delete) === TRUE){
                                echo smtp_mailer($email,$subject, $queries);
                            }
                            else{
                                echo "Error :" . $delete . "<br>" . $conn->error;
                            }
        

    }
?>