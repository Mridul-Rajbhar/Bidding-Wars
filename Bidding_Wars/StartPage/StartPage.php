<?php
    session_start();
    $Username = $_SESSION['uname'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Start Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/CSS/StartPage.css">
        <script src="/JavaScript/StartPage.js"></script>
    </head>
    <body>

        <?php 

        $conn = mysqli_connect("localhost", "id16328974_root", "Anonymou$9895", "id16328974_bidding_wars") or die("Conncetion Failed");
        ?>

        <div class="navigation">
            <ul>
                <li><a href="Profile/Profile.php">My Profile</a></li>
                <li><a href="Contact.php">Contact</a></li>
                <li><a href="Rules.html">Rules</a></li>
                <li><a  href="/index.php">Log Out</a></li>
                </ul>
         </div>
       
           <p style="text-align:left;"><font color="white">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     
    <?php
        if(isset($_GET['Message']))
        {
            echo $_GET['Message'];
        }
        ?>
        </font>
        </p>
        </h3>
        
            <div class="Form">
                
                <div id="Sell">
                    <p>Do you want to sell any Item</p>
                    <input id="checkSell" type="checkbox" onclick="checkBoxSell()"> I have read all the Rules before proceeding.
                    <p id="msg1" style="font-size:75%; color:red">Please click the check box</p>
                    <input type="button" id="sellButton" onclick="location.href='Sell.php'" value="Sell" disabled=true>
                </div>

                <div id="Buy">
                        <p>Do you want to register for any product.</p>
                        <input id="checkBuy" type="checkbox" onclick="checkBoxBuy()"> I have read all the Rules before proceeding.
                        <p id="msg2" style="font-size:75%;color:red">Please click the check box</p>
                        <input type="button" id="buyButton" onclick="location.href='Buy/Buy.php'" value="Buy" disabled=true>
                </div>
                    <form name="joinBid" action="JoinBid/TimeRemaingForBid.php" method="post">

                        <div id="JoinBid">
                                <p>Enter the product id if you want to join the bid.</p>
                                <input id="checkJoinBid" type="checkbox" onclick="checkBoxBid()"> I have read all the Rules before proceeding.
                                <p id="msg3" style="font-size:75%;color:red">Please click the check box</p>
                                <input type="text" name="ProductID" value=""><br><br>
                                <input type="submit" name="Submit" id="bidButton" value="Join" disabled=true>
                        </div>
                    </form>
            </div>
    </body>
</html>