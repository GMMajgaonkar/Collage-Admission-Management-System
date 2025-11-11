<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         td {
            padding: 8px;
            text-align: left;
        }
        
        

        button {
            margin-top: 15px;
        }
        table {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
        }
        .container {
            width: 45%;
            margin-top:2rem;
            margin-left:24rem;
            padding: 20px;
            background-color:rgb(252, 252, 252);
            box-shadow: 0 2px 10px rgba(1, 1, 1, 1);
            border-radius: 8px;}
            
    </style>
       
</head>
<body>
    <button><a href="adduser.php">Add user</a></button>
</body>
</html>

<?php
include("../connections/connection.php");
$sql2="select * from users";
    $results=mysqli_query($conn,$sql2);
    $nums=mysqli_num_rows($results);
    
        if ($nums > 0) {
            echo"<div class='container'><table><tr><th>Name</th><th>phone no</th><th>email id</th><th>password</th><th>Action</th></tr>";

            while ($rows = mysqli_fetch_assoc($results)) {

              echo" <tr><td>".$rows['name']."</td><td>".$rows['phone_no']."</td><td>
              ".$rows['email_id']."</td><td>".$rows['password']."</td><td>
            <button><a href='edituser.php?message=" . urlencode($rows['name']) . "'>Edit</a></button><button><a href='deleteuser.php?message=" . urlencode($rows['name']) . "'>Delete</a></button> </td></tr>";
            
       
            }
            echo"</table></div>";
        }
mysqli_close($conn);
        ?>

