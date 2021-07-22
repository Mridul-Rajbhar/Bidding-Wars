<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Buy Form</title>
        <link rel="stylesheet" href="http://biddingwars.tk/CSS/itemDetails.css">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <ul>
            <li><a href="/StartPage/StartPage.php">Home</a></li>
            <li><a href="#news">News</a></li>
            <li><a href="/StartPage/Contact.php">Contact</a></li>
            <li><a href="http://biddingwars.tk/StartPage/Rules.html">Rules</a></li>
      </ul>
        <table align='center' border = '0' cellspacing = '7' cellpadding = '10'>
            <thead>
            <tr>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <?php
            $conn = mysqli_connect("localhost", "id16328974_root", "Anonymou$9895", "id16328974_bidding_wars");
            if (!$conn)
            {
                die("Connection Failed:" . mysqli_connect_error());
            } 
            else 
            {   
                session_start();
                $id = $_GET['id'];
                $sql = "SELECT * FROM items WHERE product_id='$id'";
                $query = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                                <td><font color=black>Seller Name</font></td>
                                <td><font color=black><?php echo $row['seller_name'] ?></font></td>
                                </tr>
                                <tr>
                                <td><font color=black>Product Name</font></td>
                                <td><font color=black><?php echo $row['name_product'] ?></font></td>
                                </tr>
                                <tr>
                                <td><font color=black>Product Information</font></td>
                                <td><font color=black><?php echo $row['info_product'] ?></font></td>
                                </tr>
                                <tr>
                                <td><font color=black>Type</font></td>
                                <td><font color=black><?php echo $row['type_product'] ?></font></td>
                                </tr>
                                <tr>
                                <td><font color=black>Image</font></td>
                                <td><font color=black><?php echo '<img src= "data:image;base64,'.base64_encode($row['upload_product']).'"alt="Image" style="width: 200px; height: 200px;">';?></font></td>
                                </tr>
                                <tr>
                                <td><font color=black>Date of Auction</font></td>
                                <td><font color=black><?php echo $row['date'] ?></font></td>
                                </tr>
                                <tr>
                                <td><font color=black>Time Slot</font></td>
                                <td><font color=black><?php echo $row['Hours'] ?> : <?php echo $row['Minutes'] ?></font></td>
                                </tr>
                                <tr>
                                <td><font color=black>Product ID</font></td>
                                <td><font color=black><?php echo $row['product_id'] ?></font></td>
                                </tr>
                                <tr>
                                <td><font color=black>No. of Participants joined</font></td>
                                <td><font color=black><?php echo $row['people_joined_bid'] ?></font></td>
                                </tr>
                                <tr>
                                <td><form action=Buy.php><button type=submit>Back</button></form></td>
                                <td><font color=black><?php echo "<form action=Book.php onsubmit=return id()><input name=id type=hidden value=".$row['product_id']."><input name=id1 type=hidden value=".$row['people_joined_bid'].">
                                <button type=submit>Book Item</button></form>" ?></font></td>
                                </tr>
                    <?php
                }
            }
            ?>
        </table>
    </body>
</html>