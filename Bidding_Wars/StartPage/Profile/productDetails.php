<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Product Details</title>
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
        $product_id= $_GET['product_id'];
        $sql = "SELECT *FROM items where product_id = '$product_id' ";
        $query = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($query);
        if ($query !== FALSE) {
            $html_table = "<table align='center' border = '0' cellspacing = '7' cellpadding = '10'><tr>
                    <th></th>
                    <th></th></tr>";
            foreach ($query as $row) {
        
              $html_table .= '<tr>
                        <td><font color=#f31313>Seller Name</font></td>
                        <td><font color=black>' . $row['seller_name'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color=#f31313>Produt Name</font></td>
                        <td><font color=black>' . $row['name_product'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color=#f31313>Product Description</font></td>
                        <td><font color=black>' . $row['info_product'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color=#f31313>Image</font></td>
                        <td><font color=black><img src= "data:image;base64,'.base64_encode($row['upload_product']).'"alt="Image" style="width: 200px; height: 200px;"></font></td>
                        </tr>
                        <tr>
                        <td><font color=#f31313>Date of Auction</font></td>
                        <td><font color=black>' . $row['date'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color=#f31313>Time(According to IST)</font></td>
                        <td><font color=black>' . $row['Hours'] .':'. $row['Minutes'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font color=#f31313>Winner of Auction</font></td>
                        <td><font color=black>' . $row['winner'] . '</font></td>
                        </tr>';
            }
     }
    $html_table .= '</table>';
    echo "$html_table";
    }
    ?>
      <a href="http://biddingwars.tk/StartPage/Profile/Profile.php" class="button">Back</a>
</body>
</html>