<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Admin Page</title>
    <link rel="stylesheet" href="http://biddingwars.tk/CSS/Admin.css">
</head>
<body>
    <div id="mySidenav" class="sidenav">

        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="BannedUsers.php">Banned</a>
        <a href="Queries.php">Queries</a>
        <a href="/index.php">Logout</a>

     </div>
     <span style="font-size:30px;cursor:pointer;color: #7EE8FA;" onclick="openNav()">&#9776; </span>
     <?php
     $conn = mysqli_connect("localhost", "id16328974_root", "Anonymou$9895", "id16328974_bidding_wars");
     if (!$conn) {
         die("Connection Failed:" . mysqli_connect_error());
     } else {   
        session_start();
        $username= $_GET['id'];
        $sql = "SELECT *FROM registration where uname ='$username' ";
        $query = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($query);
        if ($query !== FALSE) {
            $html_table = "<table align='center' border = '0' cellspacing = '7' cellpadding = '10'><tr>
                    <th></th>
                    <th></th></tr>";
            foreach ($query as $row) {
        
              $html_table .= '<tr>
                        <td><font color=white>Username</font></td>
                        <td><font color=#7CFFCB>' . $row['uname'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color=white>First Name</font></td>
                        <td><font color=#7CFFCB>' . $row['fname'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color=white>Middle Name</font></td>
                        <td><font color=#7CFFCB>' . $row['mname'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color=white>Last Name</font></td>
                        <td><font color=#7CFFCB>' . $row['lname'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color=white>Date of Birth</font></td>
                        <td><font color=#7CFFCB>' . $row['dob'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color=white>Gender</font></td>
                        <td><font color=#7CFFCB>' . $row['gender'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color=white>room Number</font></td>
                        <td><font color=#7CFFCB>' . $row['room_no'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color=white>Locality</font></td>
                        <td><font color=#7CFFCB>' . $row['locality'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color=white>Station</font></td>
                        <td><font color=#7CFFCB>' . $row['station'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color=white>Pincode</font></td>
                        <td><font color=#7CFFCB>' . $row['pincode'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color=white>State</font></td>
                        <td><font color=#7CFFCB>' . $row['state'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color=white>Phone Number</font></td>
                        <td><font color=#7CFFCB>' . $row['phone'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color=white>Email ID</font></td>
                        <td><font color=#7CFFCB>' . $row['email'] . '</font></td>
                        </tr>
                        <tr>
                        <td><form action=Users.php><button type=submit>Back</button></form></td>
                        <td><form action=Reject.php><input name=id type=hidden value='.$row['uname'].'>
                        <button type=submit>Ban User</button></form></td>
                        </tr>';
            }
     }
    $html_table .= '</table>';
    echo "$html_table";
    }
    ?>
</body>
<script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }
    
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
    </script>
</html>