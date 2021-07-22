
<?php
session_start();
$Username = $_SESSION["uname"];
$productID = $_SESSION["ProductID"];
$basePrice = $_SESSION["basePrice"];
$conn = mysqli_connect("localhost", "id16328974_root", "Anonymou$9895", "id16328974_bidding_wars") or die("Conncetion Failed");

$mybid = $_POST["myBidKey"];
$sql="SELECT * FROM $productID Where UserName='DummyUser'";
$result=mysqli_query($conn,$sql);
$currentHighestBid;
while($row = mysqli_fetch_array($result))
{
    $currentHighestBid = $row['Highest_Bid'];
    $currentUser = $row['Status'];
}

if($currentUser == $Username)
{
    echo 5;
}
else if($mybid < $basePrice)
{
    echo 4;
}
else if($currentHighestBid < $mybid)
{
    $sql2 = "UPDATE $productID SET Highest_Bid=$mybid,bidTime=25,Status='$Username' WHERE UserName='DummyUser'";
    $sql3 = "UPDATE $productID SET Highest_Bid=$mybid WHERE UserName='$Username'";
    if(mysqli_query($conn,$sql2) && mysqli_query($conn,$sql3))
    {
        echo 1;
    }
    else
    {
        echo mysqli_error($conn);
    }
}
else if($currentHighestBid <= $mybid)
{
    echo 2;
}
else
{
    echo 3;
}
?>
