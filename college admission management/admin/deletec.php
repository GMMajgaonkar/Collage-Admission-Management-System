<?php
include("../connections/connection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
       
    
</head>
<body>

</body>
</html>

<?php
// Check if the session variable 'username' exists
if (isset($_GET['message'])) {
    $message = $_GET['message']; // Fetch the message passed via URL
    echo " ";

$sql="delete from courses where cid=$message";
if(mysqli_query($conn,$sql)){
    header("Location: courselist.php");
    exit();
}else{
    echo"error".mysqli_error($conn);
}
    
}
    
mysqli_close($conn);
?>