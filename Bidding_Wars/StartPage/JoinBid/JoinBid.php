<?php
    session_start();
    $productId = $_SESSION["ProductID"];
    $Username = $_SESSION["uname"];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Join Bid</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://biddingwars.tk/CSS/joinBid.css">
    </head>
    <body>
            <p id="totalBidTime"></p>
       <div style="text-align:center;"> 
        <?php
            $conn = mysqli_connect("localhost", "id16328974_root", "Anonymou$9895", "id16328974_bidding_wars") or die("Conncetion Failed");
            $sql1 = "SELECT * FROM $productId WHERE UserName='$Username'";
            
            $sql4 = "SELECT * FROM items WHERE product_id='$productId'";
            $duration="";
            $query1=mysqli_query($conn,$sql1);

            $query4 = mysqli_query($conn, $sql4);
            $temp="";
            $biddingMinutes="";
            $biddingHour="";
            $basePrice="";
            while($row = mysqli_fetch_array($query4))
            {
                $Day = $row["date"];// Here we are just storing the date in format YYYY-MM-DD.
                $biddingHour = $row["Hours"];
                $biddingMinutes = $row["Minutes"];
                $basePrice=$row["baseID"];
                $_SESSION["basePrice"]=$basePrice;
                $sellerName = $row["seller_name"];
                echo '<img src= "data:image;base64,'.base64_encode($row['upload_product']).'"alt="Image" style="width: 200px; height: 200px;">';
            }

            // Year , Day, Month, Hours and Minutes on which Bidding of the product will take place

            
            $_SESSION["duration"]=$duration;
            $_SESSION["start_time"]=date("Y-m-d H:i:s");
            $end_time = date('Y-m-d H:i:s', strtotime('+'.$_SESSION["duration"].'minutes',strtotime($_SESSION["start_time"])));

            if($query1)
            {
                if(mysqli_num_rows($query1)==0)
                {
                    $sql = mysqli_query($conn,"INSERT into $productId(UserName, Highest_Bid, Status) VALUES('$Username','0','Active')") or die("Connection failed");
                }  
                echo "<h3>Name of Seller: ".$sellerName;
                echo "</h3>";
                echo "<h3>Base Price:  ".$basePrice;
                echo "</h3>";
            }
        ?>
        
        <div>
            <p id="timer"></p>
        </div>
        
        <p id="highestBid"></p>
        <form id="FormID"> 
            <input type="text" id="MyBid" name="MyBid" placeholder="Place Your Bid">
            <div class="Button">
                <input class="BTN" id="submitBtn" type="submit" value="Place Bid">
            </div>
        </form>
        <p class="err_msg"  id="errorBid"> </p>
        
        <table class= "styled-table" id="DisplayTable" border = '1' cellspacing = '2' cellpadding = '10'>
        </table>
        </div>
        <script src="jquery-3.5.1.js"></script>
        
        <script>

        var Day = '<?php echo $Day;?>';
        var biddingHour = '<?php echo $biddingHour;?>';
        var biddingMinutes = '<?php echo $biddingMinutes;?>';
        var Start_Date= String(Day)+" "+String(biddingHour)+":"+String(biddingMinutes)+":"+"0";
        
        
        var dt = new Date(Start_Date);//Get Current Date
        dt.setMinutes(dt.getMinutes()+10);//Add 10 Minutes and make it CountDown Number

                 
                    ///CountDownTimer

                        // Set the date we're counting down to
                        var countDownDate = new Date(dt).getTime();

                        // Update the count down every 1 second
                        var x = setInterval(function() 
                        {
                                //console.log(dt);
                                //console.log("Called");
                                // Get today's date and time
                                var now = new Date().getTime();

                                // Find the distance between now and the count down date
                                var distance = countDownDate - now;

                                // Time calculations for minutes and seconds
                                    var minutes = Math.floor(distance/1000/60)%60;
                                    var seconds = Math.floor(distance/1000)%60

                                // Display the result in the element with id="totalBidTime"
                                document.getElementById("totalBidTime").innerHTML = minutes + ":" + seconds ;

                                // If the count down is finished, write some text
                                if (distance < 0) {
                                    clearInterval(x);
                                    
                                    document.getElementById("submitBtn").disabled = true;
                                    document.getElementById("totalBidTime").innerHTML = " Times UP";
                                    
                                    window.location.replace("TimesUp.php");  
                                }
                        }, 1000);

            

        $(document).ready(function()
            {
                // 
                //     $sql7 = "SELECT * FROM $productId WHERE Username ='DummyUser' ";
                //     $query7 = mysqli_query($conn,$sql7);
                    
                //     if($query7)
                //     {
                //         $Correct = "yes";
                        
                //     }
                //     else
                //     {
                //         $Correct = "no";
                //     }
                // 

                
                // var permission = ' echo $Correct';
                // //console.log(permission);
                // if(permission == "yes")
                // {
                    //console.log("Yse");
                    function callHighestBid()
                    {
                        $.ajax({
                            url:"highestBid.php",
                            type:"post",
                            success:function(data)
                            {
                                if(data == 0)
                                {
                                    //console.log("2");
                                    //window.location.replace("Winner.php");  
                                }
                                $("#highestBid").html(data);
                            }
                        });
                    }
                    callHighestBid();
                    
                    
                    var interval1 = setInterval(callHighestBid,1000);
                    function onLoadTable()
                    {
                        $.ajax(
                        {
                        url:"displayUsers.php",
                        type:"POST",
                        success:function(data)
                        {
                            if(data == 0)
                            {
                               // console.log("3");
                                //window.location.replace("Winner.php");  
                            }
                            $("#DisplayTable").html(data);
                        }
                        });
                    }
                    onLoadTable();      
                    var interval = setInterval(onLoadTable,1000);
                    
                    
                    var interval2 = setInterval(displayTime,1000);
                    function displayTime()
                    {
                        //console.log("display time");
                        $.ajax({
                            url:"DisplayTime.php",
                            type:"POST",
                            success:function(data)
                            {
                                //console.log("Time "+data);
                                if(data == -2)
                                {

                                //console.log("display time data");
                                $("#timer").html("Waiting for first bid") ;
                                }
                                else if(data >= 1 && data<=25)
                                {
                                // console.log("display time data>=1 && data<=15" + data);
                                    $("#timer").html(data);
                                }
                                else if(data<=0)
                                {
                                    //console.log("display time else" + data + "!!!!!!!!!!!!!!!");
                                    $("#submitBtn").attr('disabled',true);
                                    clearInterval(interval2);
                                    <?php
                                        $winner = $money = " ";
                                        $sql5 = "SELECT * FROM $productId WHERE UserName='DummyUser'";
                                        $query5 = mysqli_query($conn,$sql5);
                                        if($query5)
                                        {
                                            while($row = mysqli_fetch_array($query5))
                                            {
                                                $winner = $row["Status"];
                                                $money = $row["Highest_Bid"];
                                            }
                                        }
                                        $_SESSION["winner"] = $winner;
                                        $_SESSION["money"] = $money;
                                    ?>
                                   //console.log("4"); Only this should be called
                                    window.location.replace("TimesUp.php");   
                                }
                            }
                        });
                    }
                //}
                // else
                // {
                //     //console.log("5");
                //     window.location.replace("Winner.php");  
                // }

            });

$(document).on("click","#submitBtn",function(event)
                {
                    event.preventDefault();
                    var myBid = $("#MyBid").val();
                    $.ajax({
                        url:"updateBid.php",
                        type:"POST",
                        data:{myBidKey:myBid},
                        success:function(data)
                        {
                            
                            //console.log(data);
                            if( data == 5)
                            {
                                $("#errorBid").html("Cannot place a bid again.");      
                                $("#FormID").trigger("reset");
                   
                            }
                            else if(data == 1)
                            {
                                //console.log("data 1");
                                $("#FormID").trigger("reset");
                                $("#errorBid").html("");
                                var myVar = setInterval(Timer,1000);
                                function Timer()
                                    {
                                        //console.log("Timer function called");
                                        $.ajax({
                                            url:"Time.php",
                                            type:"post",
                                            success:function(data)
                                            {
                                                //console.log("Time function called " + data);
                                                if(data == -1)
                                                {
                                                    //console.log("Timer()");
                                                    //$("#submitBtn").attr('disabled',true);
                                                    clearInterval(myVar);
                                                }
                                            }
                                        });
                                    }

                            }
                            else if(data == 3)
                            {
                               //console.log("data 3");
                                $("#errorBid").html("Error: Your Bid Is Lower than Highest Bid");
                                $("#FormID").trigger("reset");
                            }
                            else if(data == 2)
                            {
                               // console.log("data 2");
                                $("#errorBid").html("Place a Bid higher than Highest Bid");      
                                $("#FormID").trigger("reset");  
                            }   
                            else if( data==4)
                            {
                                $("#errorBid").html("Bid less than base price");      
                                $("#FormID").trigger("reset"); 
                            }
                            
                        }
                    });

                }
             );
        </script>
    </body>
</html>