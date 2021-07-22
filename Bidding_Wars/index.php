<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>Bidding Wars</title>
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="http://biddingwars.tk/CSS/HomePage.css">
    </head>
    <body>
    <div class="nav">
       <div class="top">
            
            <ul>
                <li style="float: right;"><a href="http://biddingwars.tk/Rules.html">Rules</a></li>
                <li style="float: right;"><a href="http://biddingwars.tk/Contact.php">Contact</a></li>
                <li style="float: right;"><a href="http://biddingwars.tk/">Home</a></li>
                <list style="float: left;"><a href="http://biddingwars.tk/"><img src="http://biddingwars.tk/CSS/logo.jpg" height="60px"></a></list>
			</ul>
        </div> 
    </div>
    <h3>
    <p style="text-align:left;"><font color="white">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     
    <?php
        session_start();
        if(isset($_GET['Message']))
        {
            echo $_GET['Message'];
        }
        ?>
        </font>
        </p>
        </h3>
        
         <wrapper><div id="Home">
            <p1>Welcome  to</p1>
             <p2>&nbsp;Bidding Wars</p2>
              <br />
             <p3>Here You can</p3>
              <b>
               <span1>
                &nbsp;Sell<br /> 
                &nbsp;Buy<br />
                &nbsp;Join Bid<br />
               </span1>
              </b>
            <span2></span2>
              </div>
            </wrapper>
            
        <div class="LoginForm">
            <form name="homePageForm" onsubmit="return validateForm()" action="http://biddingwars.tk/" method="post">
                <p style="text-align:left;"><font color="white">
                    </font>
                <div class="Username">
                    <label for="uname"><p style="font-size: 110%;"></p></label>
                    <input type="text" id="uname" name="uname" placeholder="Username">
                    <p class="err_msg"  id="name_info"> </p>
                </div> <br>
                <div class="Password">
                   
                    <input type="password" id="pwd" name="pwd" placeholder="Password">
                    <p class="err_msg"  id="pwd_info"> </p>
                </div><br>
                <div class="Button">
                    <input class="BTN" id="login" type="submit" value="Log In">
                    <br>
                </div>
                
                <?php
                    $conn = mysqli_connect("localhost", "id16328974_root", "Anonymou$9895", "id16328974_bidding_wars");
                    if (!$conn) {
                        die("Connection Failed:" . mysqli_connect_error());
                    } else {
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $uname = mysqli_real_escape_string($conn, $_REQUEST['uname']);
                            $pwd = mysqli_real_escape_string($conn, $_REQUEST['pwd']);
                            $_SESSION['uname'] = $uname ;
                            if(($uname=="admin")&&($pwd=="April@1716"))
                            {
                                echo "<script>window.location.href='Admin/Admin.php'</script>";
                            }
                            else
                            {
                                $sql = "SELECT *FROM login where uname = '$uname'";
                                $query = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
                                $count = mysqli_num_rows($query);
                                if($count == 0)
                                {
                                    echo "<h3>You have not registered.<br>Click Sign Up for registration</h3>";
                                }
                                else
                                {
                                    $sql1 = "SELECT *FROM login where uname = '$uname' and pwd = '$pwd'";
                                    $query1 = mysqli_query($conn, $sql1);
                                    $row1 = mysqli_fetch_array($query1, MYSQLI_ASSOC);
                                    $count1 = mysqli_num_rows($query1);
                                    if($count1 == 0)
                                {
                                    echo "<h3>Your Password is invalid<h3>";
                                }
                                
                                else
                                {
                                    echo "<script>window.location.href='StartPage/StartPage.php'</script>";
                                }
                            }
                        }
                        }
                    }
                ?>
                <div class="Buttons">
                    <a href='http://biddingwars.tk/Password/forget.php' style="color: rgb(67, 95, 148);"0>Forgot Password</a>
                </div>
                <br>
                <div class="Buttons"><br>
                New User here?&nbsp;<a href='http://biddingwars.tk/SignUp/SignUp.php' style="color: rgb(67, 95, 148);">Sign Up</a>
            </div>
            </form>
        </div>
    </body>
    <script src="http://biddingwars.tk/JavaScript/HomePage.js"></script>
</html>