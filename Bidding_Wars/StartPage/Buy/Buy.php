<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Buy</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://biddingwars.tk/CSS/Buy.css">
    </head>
    <body>
    <ul>
            <li><a href="/StartPage/StartPage.php">Home</a></li>
            <li><a href="/StartPage/Contact.php">Contact</a></li>
            <li><a href="http://biddingwars.tk/StartPage/Rules.html">Rules</a></li>
            <li><a  href="http://biddingwars.tk">Log Out</a></li>
      </ul>
      <h3>
        <p style="text-align:center;">
            <?php
                session_start();
                if(isset($_GET['Message'])){
                    echo $_GET['Message'];
                }
            ?>
        </p>
      </h3>  
        <form action="" method="POST">
            <label for="select"></label><br>
            <select id="select" name="select">
                <option value="select">Search Product Type</option>
				<option value="Furniture">Furniture</option>
				<option value="Clothes">Clothes</option>
				<option value="Watches">Watches</option>
                <option value="Sports">Sport Equipment</option>
                <option value="Electronics">Electronics</option>
                <option value="Vechicles">Vechicles</option>
                <option value="Antique">Antiques</option>
                <option value="Others">Others</option>
            </select>

        <input type="submit" value="search" name="buy">
        </form>
        <?php
            $conn = mysqli_connect("localhost", "id16328974_root", "Anonymou$9895", "id16328974_bidding_wars");
            if(! $conn)
            {
                die("Connection Failed:".mysqli_connect_error());
            }
            else
            {
                if($_SERVER["REQUEST_METHOD"]=="POST"){
                    $select = mysqli_real_escape_string($conn,$_REQUEST['select']);
                    $query="SELECT name_product, date, Hours, Minutes, product_id, people_joined_bid FROM items where type_product='$select' and status='available'";
                    $bquery = mysqli_query($conn,$query);
                    while($row = mysqli_fetch_array($bquery)){
        ?>
        <table align='center' border = '1' cellspacing = '0' cellpadding = '3'>
            <thead>
            <tr>
            <th>Name Of Product</th>
            <th>Auction date</th>
            <th>Time Slot</th>
            <th>Product ID</th>
            <th>Participants</th>
            <th>View Details</th>
            </tr>
            </thead>
                    <tr>
                    <td><font color=black><?php echo $row['name_product'] ?></font></td>
                    <td><font color=black><?php echo $row['date'] ?></font></td>
                    <td><font color=black><?php echo $row['Hours'].":".$row['Minutes'] ?></font></td>
                    <td><font color=black><?php echo $row['product_id'] ?></font></td>
                    <td><font color=black><?php echo $row['people_joined_bid'] ?></font></td>
                    <td><font color=black><?php echo "<form action=itemDetails.php><input name=id type=hidden value=".$row['product_id'].">
                                            <button type=submit>View Details</button></form>" ?></font></td>
                    </tr>
            <?php
                    }
                }
            }   
            ?>
        </table>

        
    </body>
</html>