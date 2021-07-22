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
    $sql = "SELECT uname, fname, lname, phone, email FROM registration";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);
    if($count == 0){
      echo "";
    }else{
    if ($query !== FALSE) {
      $html_table = "<table align='center' border = '1' cellspacing = '2' cellpadding = '10'><tr>
              <th><font color=white>Username</font></th>
              <th><font color=white>First Name</font></th>
              <th><font color=white>Last Name</font></th>
              <th><font color=white>Phone Number</font></th>
              <th><font color=white>Email ID</font></th>
              <th><font color=white>View Details</font></th></tr>";
      foreach ($query as $row) {
  
        $html_table .= '<tr>
                  <td><font color=#7CFFCB>' . $row['uname'] . '</font></td>
                  <td><font color=#7CFFCB>' . $row['fname'] . '</font></td>
                  <td><font color=#7CFFCB>' . $row['lname'] . '</font></td>
                  <td><font color=#7CFFCB>' . $row['phone'] . '</font></td>
                  <td><font color=#7CFFCB>' . $row['email'] . '</font></td>
                  <td><form action=Details.php><input name=id type=hidden value='.$row['uname'].'>
                  <button type=submit>View Details</button></form></td>
                  </tr>';
      }
    }
    $html_table .= '</table>';
    echo "$html_table";
  }
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