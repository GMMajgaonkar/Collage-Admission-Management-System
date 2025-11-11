<?php
$servername="localhost";
$username="root";
$password="";
$database="collegeadmission";

$conn=new mysqli($servername,$username,$password,$database);
if($conn->connect_error)
{
    die("connection faild".$conn->connect_error);
}
else{
    echo" ";
}
?>