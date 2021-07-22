<?php
    session_start();
    $UserName = $_SESSION["uname"];
    $productID = $_SESSION["ProductID"];
    $conn = mysqli_connect("localhost", "id16328974_root", "Anonymou$9895", "id16328974_bidding_wars") or die("Conncetion Failed");
    $sql="SELECT Highest_Bid, Status FROM $productID Where UserName='DummyUser'";
    $result = mysqli_query($conn, $sql) or die("failed");
    $output = "Current Highest Bid is ";
    if($result)
    {
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_array($result))
            {
                $output .= $row['Highest_Bid']." by ".$row['Status'];
            }
        }
        echo $output;
    }
    else
    {
        echo 0;
    }
    mysqli_close($conn);
?>