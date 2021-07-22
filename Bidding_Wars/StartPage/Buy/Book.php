<?php
    session_start();
    $conn = mysqli_connect("localhost", "id16328974_root", "Anonymou$9895", "id16328974_bidding_wars");
if (!$conn) {
    die("Connection Failed:" . mysqli_connect_error());
} 
else 
{  
   $product_id= $_GET['id'];
   $uname = $_SESSION['uname'];
    $sql = "SELECT * FROM items WHERE product_id='$product_id' and status='available' ";
    $joined;
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result))
    {
        $joined = $row["people_joined_bid"];
        $sellerName = $row["seller_name"];
        //echo "$joined";
    }
   if($joined == 10){
       $update = "UPDATE items SET status='unavailable' where product_id='$product_id'";
       mysqli_query($conn,$update);
    }
    else{ 
            if($joined == 9)
            {
            $update = "UPDATE items SET status='unavailable' where product_id='$product_id'";
            mysqli_query($conn,$update);
            }
            $query="SELECT * FROM items where product_id='$product_id' and (Username1='$uname' or Username2='$uname' or Username3='$uname' or Username4='$uname' or Username5='$uname'or Username6='$uname'or Username7='$uname'or Username8='$uname'or Username9='$uname'or Username10='$uname') ";
            $bquery = mysqli_query($conn, $query);
            $count = mysqli_num_rows($bquery);
            if($uname == $sellerName)
            {
                $mssg = urldecode(" You are seller of product so you can not register." );
                header("Location:Buy.php?Message=".$mssg);
                die;
            }
            else if ($count > 0) {
               // echo "$product_id";
                $mssg = urldecode("You have been already registered of product with ID $product_id." );
                header("Location:Buy.php?Message=".$mssg);
                die;
            } 
            else{
                $joined++;
                $sql1 = "SELECT Username1,Username2,Username3,Username4,Username5,Username6,Username7,Username8,Username9,Username10 from items where product_id='$product_id'";
                    if($result1 = mysqli_query($conn,$sql1))
                    {
                        $book; 
                        while($row1 = mysqli_fetch_array($result1))
                        {
                            for($i=1;$i<=10;$i++)
                            {
                                $username = "Username".strval($i);
                                if($row1[$username]==NULL)
                                {
                              
                                    $book = "UPDATE items SET people_joined_bid='$joined',$username='$uname' where product_id='$product_id' ";
                                    break;
                                }
                            }
                        }
                    }
                    
                    
                    if (mysqli_query($conn,$book)){
                        $mssg = urldecode("You have been successfully registered");
                        header("Location:Buy.php?Message=".$mssg);
                        die;
                    } else {
                    echo "Error: " . $book . "<br>" . mysqli_error($conn);
                    }
            }
        }
    }
?>