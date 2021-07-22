<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell</title>
    <link rel="stylesheet" href="/CSS/Sell.css">
    <script src="jquery-3.5.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div>
    <ul>
        <li><a href="StartPage.php">Home</a></li>
        <li><a href="Contact.php">Contact</a></li>
        <li><a href="Rules.html">Rules</a></li>
        <li><a  href="http://biddingwars.tk">Log Out</a></li>
    </ul>
    </div>
    <div class="Form">
        <form name="sellForm" onsubmit="return validateForm()" action = "Sell.php" method = "post" enctype="multipart/form-data">

			 <?php
             $sellerName=$_SESSION['uname'];
            $conn = mysqli_connect("localhost", "id16328974_root", "Anonymou$9895", "id16328974_bidding_wars");
		    if (!$conn) 
            {
			die("Connection Failed:" . mysqli_connect_error()) ;
		    } 
            else 
                {
                    if($_SERVER["REQUEST_METHOD"] == "POST")
                    {
                        
                        $name= mysqli_real_escape_string($conn, $_REQUEST['name_product']);
                        $info= mysqli_real_escape_string($conn, $_REQUEST['info_product']);
                        $type= mysqli_real_escape_string($conn, $_REQUEST['type_product']);
                        $date= mysqli_real_escape_string($conn, $_REQUEST['date']);
                        $Hour= mysqli_real_escape_string($conn, $_REQUEST['Hours']);
                        $Minutes= mysqli_real_escape_string($conn, $_REQUEST['Minutes']);
                        $id= mysqli_real_escape_string($conn, $_REQUEST['product_id']);
                        $basePrice = mysqli_real_escape_string($conn,$_REQUEST['base_id']);
                        
                        if(!empty($_FILES["upload_product"]["name"])) 
                        { 
                            // Get file info 
                            $fileName = basename($_FILES["upload_product"]["name"]); 
                            $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
                            
                            // Allow certain file formats 
                            $allowTypes = array('jpg','png','jpeg','gif'); 
                            if(in_array($fileType, $allowTypes)){ 
                                $image = $_FILES['upload_product']['tmp_name']; 
                                $imgContent = addslashes(file_get_contents($image)); 
                        
                        
                                // $time_query = "SELECT *FROM auction_slot where date = '$date' and Hours ='$Hour' and Minutes ='$Minutes'";
                                // $query = mysqli_query($conn, $time_query);
                                // $count = mysqli_num_rows($query);
                                // if ($count > 0){
                                //     echo "<h3><b>Slot Not Available</b></h3>";
                                // }
                                // else{
                                //     $slot = "INSERT into auction_slot values ('$date','$Hour','$Minutes')";
                                //     if ($conn ->query($slot) === TRUE)
                                //     {
                        
                                $sql ="INSERT INTO items (name_product,info_product,type_product,upload_product,date,Hours,Minutes,product_id,status,people_joined_bid,seller_name,baseID) values ('$name','$info','$type','$imgContent','$date','$Hour','$Minutes', '$id','available','0','$sellerName','$basePrice')";
                            
                                if ($conn->query($sql) === TRUE) 
                                {
                                    echo "<br>You Item has been succesfully registered for auction."; 
                                    echo "<br>Your product id is, $id";
                                }
                                else
                                {
                                    echo "Error :" . $sql . "<br>" . $conn->error;
                                }                     
                                
                            //check if table exist or not
                                $sql1 = "CREATE TABLE $id(
                                UserName VARCHAR(50),
                                Highest_Bid INT(20),
                                Status VARCHAR(50),
                                bidTime INT(50))
                                ";
                                $query1 = mysqli_query($conn,$sql1);
                                $query2 = mysqli_query($conn, "INSERT INTO $id(UserName, bidTime) values ('DummyUser','-2')");
                            
                    
                            }
                        }
                    }
                }
			?>
			
            <label for="name_product"><p class="text" style="font-size: 110%;display: inline-block;">Enter the name of product :</p></label>
            <input type="text" id="name_product" name="name_product">
            <p class="err_msg" style="font-size:80%;color:red" id="name_product_info"> </p>

            <label for="info_product"><p class="text" style="font-size: 110%;display: inline-block;">Give more information about product :</p></label><br>
            <textarea id="w3review" name="info_product" rows="10" cols="50"></textarea>
            <p class="err_msg" style="font-size:80%;color:red" id="info_product_info"> </p>

            <label for="type_product"><p class="text" style="font-size: 110%;display: inline-block;">Select type of the product :</p></label>
            <select id="type_product" name="type_product" >
                <option value="select">Select</option>
				<option value="Furniture">Furniture</option>
				<option value="Clothes">Clothes</option>
				<option value="Watches">Watches</option>
                <option value="Sports">Sport Equipment</option>
                <option value="Electronics">Electronics</option>
                <option value="Vechicles">Vechicles</option>
                <option value="Antique">Antiques</option>
                <option value="Others">Others</option>
			</select>
            <p class="err_msg" style="font-size:80%;color:red" id="type_product_info"> </p>

            <label for="upload_product"><p class="text" style="font-size: 110%;display: inline-block;">Upload photo of product :</p></label>
            <input type="file" id="upload_product" name="upload_product" multiple size="5">
            <p class="err_msg" style="font-size:80%;color:red" id="upload_product_info"></p>

            <label for="date"><p class="text" style="font-size: 110%;display: inline-block;">Select date for auction:</p></label>
            <input type="date" id="dateID" name="date" max="0" min="0"><br>
            <p class="err_msg" style="font-size:80%;color:red" id="date_info"></p>

            Select time slot for auction:
            <label for="time_slot"><p class="text" style="font-size: 110%;display: inline-block;">Hour:</p></label>
            <select id="time_slot" name="Hours" >
                    <option value="select">Select</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
			</select>
            <label for="time_slot"><p class="text" style="font-size: 110%;display: inline-block;">Minutes:</p></label>
            <select id="time_slot" name="Minutes" >
                    <option value="select">Select</option>
                    <option value="00">0</option>
                    <option value="15">15</option>
                    <option value="30">30</option>
                    <option value="45">45</option>
			</select>
            <p class="err_msg" style="font-size:80%;color:red" id="time_slot_info"> </p>

            <label><p class="text" style="font-size: 110%;display: inline-block;">Enter the base price of product:</p></label>
            <input type="number" name="base_id" id="base_id"><br>

            <label><p class="text" style="font-size: 110%;display: inline-block;">Your Product key:</p></label>
            <input id="product_id" name="product_id" type="hidden" value=""><br>

            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
<script src="/JavaScript/Sell.js"></script>
</html>
