<?php
session_start();

$productID = $_SESSION["ProductID"];
$UserName = $_SESSION["uname"];

?>
<html>
    <head>
        <title>Winner</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://biddingwars.tk/CSS/Winner.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,200" rel="stylesheet" type="text/css">
    </head>

    <body>
        
    <div class="nav">
       <div class="top">
            <ul>
                <li style="float: right;"><a href="http://biddingwars.tk/StartPage/Rules.html">Rules</a></li>
                <li style="float: right;"><a href="http://biddingwars.tk/StartPage/Contact.php">Contact</a></li>
                <li style="float: right;"><a href="http://biddingwars.tk/StartPage/StartPage.php">Home</a></li>
                <list style="float: left;"><a href="http://biddingwars.tk/StartPage/StartPage.php"><img src="http://biddingwars.tk/CSS/logo.jpg" height="60px"></a></list>
			</ul>
        </div> 
    </div>
    <?php
    $conn = mysqli_connect("localhost", "id16328974_root", "Anonymou$9895", "id16328974_bidding_wars") or die("Conncetion Failed");
    $money = $_SESSION["money"];
    $winner = $_SESSION["winner"];
        $uquery = "UPDATE items SET winner='$winner', Highest_bid='$money' WHERE product_id='$productID'";
        if($conn->query($uquery) === TRUE)
        {
            $dquery = "DROP TABLE $productID";
			if($conn->query($dquery) === TRUE)
			{
				$update = "UPDATE items SET status ='unavailable' WHERE product_id ='$productID'";
                if($conn->query($update) === TRUE)
                {
                    echo " ";
                }
			}
        }
    ?>
    <p style="text-align:center;"> <font color ="white" >
    <h3>
        <?php
            if($money == 0)
            {
        ?>
        <br><br>
        <p style="text-align:center;">Since participants hasn't initiated any bid ,there is no winner for this auction</p>
        <?php
            }
            else
            {
            ?>
            <h1>CONGRATULATIONS!!!</h1>
            <p style="text-align:center;"><?php echo $winner; ?> wins the auction by bidding highest amount of ₹ <?php echo $money; }?></p>
    </h3>
    </font></p>
    
    </body>
</html>