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
        <a href="Users.php">Registered</a>
        <a href="BannedUsers.php">Banned</a>
        <a href="/index.php">Logout</a>

    </div>
    <span style="font-size:30px;cursor:pointer;color: #7EE8FA;" onclick="openNav()">&#9776; </span>
    
    <?php
     $conn = mysqli_connect("localhost", "id16328974_root", "Anonymou$9895", "id16328974_bidding_wars");
     if (!$conn) {
         die("Connection Failed:" . mysqli_connect_error());
     } else {   
        session_start();
        $sql = "SELECT *FROM  contact";
        $query = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($query);
        if($count == 0){
          echo "<h3><p style=text-align:center>No Queires Registered</font></p></h3>";
        }
        else{
          if ($query !== FALSE) {
          $html_table = "<table align='center' border = '1' cellspacing = '2' cellpadding = '25'><tr>
            <th><font color=white>Name</font></th>
            <th><font color=white>Email</font></th>
            <th><font color=white>Problem Description</font></th>
            <th><font color=white>Reply</font></th>
            <th><font color=white>Solve</font></th></tr>";
            foreach ($query as $row) {
            $html_table .= '<form action=SolveQuery.php method=get>
                            <tr>
                            <td><font color=#7CFFCB>' . $row['name'] . '</font></td>
                            <td><font color=#7CFFCB>' . $row['email'] . '</font></td>
                            <td><font color=#7CFFCB>' . $row['queries'] . '</font></td>
                            <td><font color=#7CFFCB></font><textarea id="queries" name="queries" rows="7" cols="25"></textarea></td>
                            <td><input name=id type=hidden value='.$row['Sr_No'].'><input name=email type=hidden value='.$row['email'].'>
                            <button type=submit>Reply</button>
                            </form></td></tr>';
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