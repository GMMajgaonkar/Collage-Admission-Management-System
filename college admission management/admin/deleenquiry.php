<?php
include("../connections/connection.php");

if (isset($_GET['message'])) {
            $message = $_GET['message']; // Fetch the message passed via URL
            echo " ";
       $sql="delete from contacts where id=$message" ;
       if(mysqli_query($conn,$sql)){
        echo "<script type='text/javascript'>alert('delete successfully!');</script>";
        header("Location: enquiry.php");
        exit();
    }else{
        echo"error".mysqli_error($conn);
    }}
    
    mysqli_close($conn);
?>