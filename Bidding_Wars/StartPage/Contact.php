<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>Contact Us</title>
        <link rel="stylesheet" href="/CSS/Contact.css">
    </head>
    <body>
        <div class="navigation">
            <div class="top-right">
                <ul>
                    <li><a href="StartPage.php">Home</a></li>
                    <li><a href="Rules.html">Rules</a></li>
              </ul> 
             </div> 
        </div>
        <h1>Contact Form</h1>
        <div class="Form">
    	
        <form name="ContactForm" onsubmit="return validateContactForm()" method="post" action="Contact.php">

        <div class="Username">
            <label for="name"><p style="font-size: 110%;"></p></label>
			<input type="text" id="name" name="name" placeholder="Name">
            <p class="err_msg"  id="name_info"> </p>
        </div> <br>

        <div class="Email ID">
        <label for="email"><p style="font-size: 110%;"></p></label>
			<input type="email" id="email" name="email" placeholder="Email ID">
            <p class="err_msg"  id="email_info"> </p>
        </div> <br>
            
        <div class="Queries">
            <label for="queries"><p style="font-size: 110%;"></label>
			<textarea id="queries" name="queries" placeholder="Describe your queries"></textarea>
            <p class="err_msg"  id="queries_info"> </p>
        </div> <br>			

            <?php
		        $conn = mysqli_connect("localhost", "id16328974_root", "Anonymou$9895", "id16328974_bidding_wars");
		        if (!$conn) {
			    die("Connection Failed:" . mysqli_connect_error());
		        } else {
			    if (isset($_POST['submit'])) {
				    $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
				    $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
				    $queries = mysqli_real_escape_string($conn, $_REQUEST['queries']);
                    $sr_no = mt_rand(0, 99);
                    $sql = "INSERT INTO contact VALUES('$sr_no', '$name', '$email', '$queries')";

				if ($conn->query($sql) === TRUE) {
                   $mssg = urldecode("$name, Your Query Has Been Registered");
                       header("Location:http://biddingwars.tk/StartPage/StartPage.php?Message=".$mssg);
				} else {
					//echo "Error :" . $sql . "<br>" . $conn->error;
				}
			}
		}
		?>

			<input type="submit" value="Submit" name="submit">

		</form></div>
    </body>
    <script src="JavaScript/Contact.js"></script>
</html>