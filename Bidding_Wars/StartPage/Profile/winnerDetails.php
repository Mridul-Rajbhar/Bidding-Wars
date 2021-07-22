<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Winner Details</title>
    <link rel="stylesheet" href="http://biddingwars.tk/CSS/Profile.css">
    <link rel="stylesheet" href="http://biddingwars.tk/CSS/Details.css">
</head>
<body>

     <?php
     $conn = mysqli_connect("localhost", "id16328974_root", "Anonymou$9895", "id16328974_bidding_wars");
     if (!$conn) {
         die("Connection Failed:" . mysqli_connect_error());
     } else {   
        session_start();
        $winner = $_GET['winner'];
        $sql = "SELECT *FROM registration where uname ='$winner' ";
        $query = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($query);
        if ($query !== FALSE) {
            $html_table = "<table align='center' border = '0' cellspacing = '7' cellpadding = '10'><tr>
                    <th></th>
                    <th></th></tr>";
            foreach ($query as $row) {
        
              $html_table .= '<tr>
                        <td><font color=#f31313>Username</font></td>
                        <td><font color=black>' . $row['uname'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color=#f31313>First Name</font></td>
                        <td><font color=black>' . $row['fname'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color=#f31313>Middle Name</font></td>
                        <td><font color=black>' . $row['mname'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color=#f31313>Last Name</font></td>
                        <td><font color=black>' . $row['lname'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color=#f31313>Gender</font></td>
                        <td><font color=black>' . $row['gender'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color=#f31313>Phone Number</font></td>
                        <td><font color=black>' . $row['phone'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color=#f31313>Email ID</font></td>
                        <td><font color=black>' . $row['email'] . '</font></td>
                        </tr>';
            }
     }
    $html_table .= '</table>';
    echo "$html_table";
    }
    ?>
    <a href="http://biddingwars.tk/StartPage/Profile/Profile.php" class="button">Back</a>
    </div>
</body>
</html>