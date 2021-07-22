<?php
session_start();
//called within update for one user 
    $productID = $_SESSION["ProductID"];
    $Username = $_SESSION["uname"];
    $conn = mysqli_connect("localhost", "id16328974_root", "Anonymou$9895", "id16328974_bidding_wars");
    $result = mysqli_query($conn,"SELECT * FROM $productID WHERE UserName='DummyUser' and Status='$Username'");
    if(mysqli_num_rows($result) >0)
    {
        $counterTime;
        while($row = mysqli_fetch_array($result))
        {
            //$CurrentBidder = $row['Status'];
            $counterTime = $row['bidTime'];
        }
        $decrementValue = $counterTime -1;
        mysqli_query($conn,"UPDATE $productID SET bidTime=$decrementValue WHERE UserName='DummyUser'");
        echo $counterTime;
    }
    else
    {
        echo -1;
    }
?>