<?php
    session_start();
    $username= $_SESSION['uname'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>My Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://biddingwars.tk/CSS/Profile.css">
    </head>
    <body>

        <div class="navigation">
            <ul>
                <li><a href="/StartPage/StartPage.php">Home</a></li>
                <li><a href="/StartPage/Contact.php">Contact</a></li>
                <li><a href="http://biddingwars.tk/StartPage/Rules.html">Rules</a></li>
                <li><a  href="http://biddingwars.tk">Log Out</a></li>
                </ul>
         </div>

    <?php 
        $conn = mysqli_connect("localhost", "id16328974_root", "Anonymou$9895", "id16328974_bidding_wars") or die("Conncetion Failed");
        $sql = "SELECT *FROM registration where uname ='$username' ";
        $query = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($query);
        if ($query !== FALSE) {
            $html_table = "<table align='center' border = '0' cellspacing = '7' cellpadding = '10'><tr>
                    <th></th>
                    <th></th></tr>";
            foreach ($query as $row) {
        
              $html_table .= '<tr>
                        <td><font color= #f31313>Username</font></td>
                        <td><font color=black>' . $row['uname'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color= #f31313>First Name</font></td>
                        <td><font color=black>' . $row['fname'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color= #f31313>Middle Name</font></td>
                        <td><font color=black>' . $row['mname'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color= #f31313>Last Name</font></td>
                        <td><font color=black>' . $row['lname'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color= #f31313>Date of Birth</font></td>
                        <td><font color=black>' . $row['dob'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color= #f31313>Gender</font></td>
                        <td><font color=black>' . $row['gender'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color= #f31313>Phone Number</font></td>
                        <td><font color=black>' . $row['phone'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color= #f31313>Email ID</font></td>
                        <td><font color=black>' . $row['email'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color= #f31313>room Number</font></td>
                        <td><font color=black>' . $row['room_no'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color= #f31313>Locality</font></td>
                        <td><font color=black>' . $row['locality'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color= #f31313>Station</font></td>
                        <td><font color=black>' . $row['station'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color= #f31313>Pincode</font></td>
                        <td><font color=black>' . $row['pincode'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color= #f31313>State</font></td>
                        <td><font color=black>' . $row['state'] . '</font></td>
                        </tr>';
            }
     }
    $html_table .= '</table>';
    echo "$html_table";     
    ?>
     
    <h2><p style="text-align:center">Products Registered for Selling</h2>
    <?php
       $sql = "SELECT date, Hours, Minutes, product_id, winner FROM items where seller_name ='$username' ";
       $query = mysqli_query($conn, $sql);
       $count = mysqli_num_rows($query);
       if($count == 0)
       {
           echo"<h4><p><font color=black><p style = text-align:center>No product registered for Auction</p></font></p></h4>";
       }
       else
       {
            if ($query !== FALSE) {
            $sell_table = "<table align='center' border = '1' cellspacing = '1' cellpadding = '10'><tr>
                <th>Product ID</th>
                <th>Date</th>
                <th>Time(IST)</th>
                <th>Winner</th>
                <th>Highest Bid</th></tr>";
            foreach ($query as $row) {
                $sell_table .= '<tr>
                <td><font color=black><a href = productDetails.php?product_id='. $row['product_id'] .'>'. $row['product_id'] .'</a></font></td>
                <td><font color=black>' . $row['date'] . '</font></td>
                <td><font color=black>' . $row['Hours'] .':'. $row['Minutes'] . '</font></td>
                <td><font color=black><a href = winnerDetails.php?winner='. $row['winner'] .'>'. $row['winner'] .'</a></font></td>
                <td><font color=black>' . $row['Highest_Bid'] . '</font></td>
                </tr>';
            }
        }
        $sell_table .= '</table>';
        echo "$sell_table";
    }
    ?>

    <h2><p style="text-align:center">Products Registered for Buying</h2>
    <?php
       $sql = "SELECT  *FROM items where Username1 ='$username' OR Username2 ='$username' OR Username3 ='$username' OR Username4 ='$username' OR Username5 ='$username' or Username6='$username'or Username7='$username'or Username8='$username'or Username9='$username'or Username10='$username' ";
       $query = mysqli_query($conn, $sql);
       $count = mysqli_num_rows($query);
       if($count == 0)
       {
           echo"<h4><p><font color=black><p style = text-align:center>You have not registered for any Auction</p></font></p></h4>";
       }
       else
       {
            if ($query !== FALSE) {
            $buy_table = "<table align='center' border = '1' cellspacing = '1' cellpadding = '10'><tr>
                <th>Product ID</th>
                <th>Date</th>
                <th>Time</th>
                <th>Winner</th>
                <th>Highest Bid</th></tr>";
            foreach ($query as $row) {
                $buy_table .= '<tr>
                <td><font color=black><a href = productDetails.php?product_id='. $row['product_id'] .'>'. $row['product_id'] .'</a></font></td>
                <td><font color=black>' . $row['date'] . '</font></td>
                <td><font color=black>' . $row['Hours'] .':'. $row['Minutes'] . '</font></td>
                <td><font color=black><a href = winnerDetails.php?winner='. $row['winner'] .'>'. $row['winner'] .'</a></font></td>
                <td><font color=black>' . $row['Highest_Bid'] . '</font></td>
                </tr>';
            }
        }
        $buy_table .= '</table>';
        echo "$buy_table";
    }
    ?>

    </body>
</html>