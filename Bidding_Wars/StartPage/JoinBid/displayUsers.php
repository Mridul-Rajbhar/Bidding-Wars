<?php
session_start();
$productID = $_SESSION["ProductID"];
$conn = mysqli_connect("localhost", "id16328974_root", "Anonymou$9895", "id16328974_bidding_wars") or die("Connection failed");
$query1 = "SELECT * FROM $productID WHERE UserName!='DummyUser' ORDER BY Highest_Bid DESC";
$result1 = mysqli_query($conn,$query1);
$output="";
if($result1)
{
    $output= '<table>
                <tr>
                    <th> Name </th>
                    <th> Bid  </th>
                </tr>
                ';
    while($row = mysqli_fetch_array($result1))
    {
        $output.=
                "
                <tr>
                    <td>{$row["UserName"]}</td>
                    <td>{$row["Highest_Bid"]}</td>
                </tr>
                ";
    }
    $output.='</table>';
    mysqli_close($conn);
    echo $output;
}
else
{
    echo 0;
}
?>