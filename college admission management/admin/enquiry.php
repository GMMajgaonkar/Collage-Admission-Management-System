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
            padding: 30px;
            background-color:rgb(252, 252, 252);
            box-shadow: 0 2px 10px rgba(1, 1, 1, 1);
            border-radius: 8px;}
            
    </style>
</head>
<body>
   <center> <h1>Student Enquiry</h1></center> 
</body>
</html>
<?php
include("../connections/connection.php");
$sql2="select * from contacts";
    $results=mysqli_query($conn,$sql2);
    $nums=mysqli_num_rows($results);
    
        if ($nums > 0) {
            echo"<div class='container'><table><tr><th>id</th><th>name</th><th>Email</th><th>masseges</th><th>Date</th><th>Action</th></tr>";

            while ($rows = mysqli_fetch_assoc($results)) {

              echo" <tr><td>".$rows['id']."</td><td>".$rows['name']."</td><td>
              ".$rows['email']."</td><td>".$rows['message']."</td><td>".$rows['date']."</td><td>
           
            <button><a href='deleenquiry.php?message=" . urlencode($rows['id']) . "'>Delete</a></button>
        </td></tr>";
            }
            echo"</table></div>";
        }
       
mysqli_close($conn);
        ?>