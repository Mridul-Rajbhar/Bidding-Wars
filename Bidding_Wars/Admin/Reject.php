<?php
$conn = mysqli_connect("localhost", "id16328974_root", "Anonymou$9895", "id16328974_bidding_wars");
if (!$conn) {
    die("Connection Failed:" . mysqli_connect_error());
} else {   
   session_start();
   $username= $_GET['id'];
   $sql = "UPDATE registration set status = 'rejected' where uname = '$username' ";
   if ($conn->query($sql) === TRUE) {
        echo "<script>window.location.href='Users.php'</script>";
        $delete = "DELETE FROM login where uname = '$username' ";
        if($conn->query($delete) === TRUE){
            echo "";
        }
        else{
            echo "Error :" . $delete . "<br>" . $conn->error;
        }
} else {
    echo "Error :" . $sql . "<br>" . $conn->error;
}
}
?>