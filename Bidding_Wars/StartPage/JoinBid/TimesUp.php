<html lang="en">
    <head>
        <title>Join Bid</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://biddingwars.tk/CSS/joinBid.css">
    </head>
<?php
    session_start();
    $productId = $_SESSION["ProductID"];
    $Username = $_SESSION["uname"];
    $conn = mysqli_connect("localhost", "id16328974_root", "Anonymou$9895", "id16328974_bidding_wars") or die("Conncetion Failed");
	$sqltm = "SELECT * FROM $productId WHERE UserName='DummyUser'";
    $querytm = mysqli_query($conn,$sqltm);
    if($querytm)
    {
        while($row = mysqli_fetch_array($querytm))
        {
            if(is_null($row['Status']))
            {
                $winner = "no one";
                $money = 0;
				$_SESSION["winner"] = $winner;
				$_SESSION["money"] = $money;
				echo "<script>window.location.href='http://biddingwars.tk/StartPage/JoinBid/Winner.php'</script>";
                }
                else
                {
					$winner = $row["Status"];
					$money = $row["Highest_Bid"];
					$_SESSION["winner"] = $winner;
					$_SESSION["money"] = $money;
					echo "<script>window.location.href='http://biddingwars.tk/StartPage/JoinBid/Winner.php'</script>";
                }
            }
        }
        else
        {
            echo "false";
        }
?>
</html>