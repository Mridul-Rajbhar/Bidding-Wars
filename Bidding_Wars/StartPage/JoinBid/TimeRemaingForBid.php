<?php
session_start();
    $productId = $_POST["ProductID"];
    $_SESSION["ProductID"] = $productId;
    $userName = $_SESSION["uname"];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Time Remaining For Bid</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://biddingwars.tk/CSS/TimeRemaingForBid.css">
    </head>
    <body>
        <?php
        

            
            $conn = mysqli_connect("localhost", "id16328974_root", "Anonymou$9895", "id16328974_bidding_wars") or die("Conncetion Failed");
            $sql4 = "SELECT * FROM items WHERE status='available' and product_id='$productId'";
            $query4 = mysqli_query($conn, $sql4);
            $Day="";
            $biddingMinutes="";
            $biddingHour="";

            
            
            if(mysqli_num_rows($query4)>0)
            {
                $sql2 = "SELECT * FROM items WHERE product_id='$productId' and Username1 = '$userName' or Username2 = '$userName' or Username3 = '$userName' or Username4 = '$userName' or Username5 = '$userName' or Username6 = '$userName' or Username7 = '$userName' or Username8 = '$userName' or Username9 = '$userName' or Username10 = '$userName'";
                $query2 = mysqli_query($conn, $sql2);
                while($row = mysqli_fetch_array($query4))
                {
                    $Day = $row["date"];// Here we are just storing the date in format YYYY-MM-DD.
                    $biddingHour = $row["Hours"];
                    $biddingMinutes = $row["Minutes"];
                    $sellerName = $row["seller_name"];
                    //$people_joined_bid = $row["people_joined_bid"];
                }
                if($userName == $sellerName)
                {
                    $message = "You are seller of the product so you can not participate in the bid.";
                }
                else if(mysqli_num_rows($query2)==0)
                {
                $message = "You cannot participate in bid because you have not registered for product"; 
                }
                else
                {
                    $message = "Time remaining for bid to start";
                }         
            }
            else
            {
                $message = "No Product with such product Id.";
            }

        ?>
   <div class="container">  
        <br>
        <h3 id="displayMessage"></h3>
        <br><br><br><br>
        <h1 id="displayTime"></h1>
    </div>
    
        <script src="jquery-3.5.1.js"></script>
        <script>
    
            var Day = '<?php echo $Day?>';
            var biddingHour = '<?php echo $biddingHour ?>';
            var biddingMinutes = '<?php echo $biddingMinutes ?>';
            var message = '<?php echo $message ?>';
            var Start_Date= String(Day)+" "+String(biddingHour)+":"+String(biddingMinutes)+":"+"0";
            
            document.getElementById("displayMessage").innerHTML = message;

        // console.log(Start_Date);
            

            ///CountDownTimer

                        // Set the date we're counting down to
                var countDownDate = new Date(Start_Date).getTime();

                // Update the count down every 1 second
                var x = setInterval(function() {
                //console.log("Called");
                // Get today's date and time
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / 1000/60/60/24);
                var hours = Math.floor(distance / 1000/60/60) % 24;
                var minutes = Math.floor(distance/1000/60)%60;
                var seconds = Math.floor(distance/1000)%60;

                // Display the result in the element with id="demo"
                document.getElementById("displayTime").innerHTML = "\xa0\xa0" + days +"\xa0\xa0\xa0\xa0\xa0\xa0\xa0" + hours + "\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0" + minutes + "\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0" + seconds + "\xa0\xa0\xa0\xa0\xa0" + "<br>Days Hours Minutes Seconds";

                // If the count down is finished, write some text
                if (distance <= 0) {
                    
                    if(message=="Time remaining for bid to start")
                    {                        
                        window.location.replace("JoinBid.php");    
                       // console.log(distance);                
                    }
                    else
                    {
                        document.getElementById("displayTime").innerHTML = "";   
                    }
                    clearInterval(x);
                    
                }
                }, 1000);
            
            
        </script>

    </body> 
</html>