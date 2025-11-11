<?php
include("../connections/connection.php");
include('../index.php');
?>



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
        input[type="text"],input[type="password"]{
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"],input[type="reset"] {
            margin-top: 15px;
        }
        table {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
        }
        .container {
            width: 35%;
            margin-top:5rem;
            padding: 20px;
            background-color:rgb(252, 252, 252);
            box-shadow: 0 2px 10px rgba(1, 1, 1, 1);
            border-radius: 8px;}
            
    </style>
       
</head>
<body>
<div class="container"><table>
   <form method="POST">
   
    <tr><td>Enter user name</td><td><input type="text" name="name"></td></tr>
    <tr><td>Enter Phone_number</td><td><input type="text" name="phone"></td></tr>
    <tr><td>Enter email_id</td><td><input type="text" name="email"></td></tr>
    <tr><td>Enter password</td><td><input type="password" name="password"></td></tr>
    <tr><td><input type="submit" value="submit" name="submit"></td><td><input type="reset" value="Cancel" name="cancel"></td></tr>
   
   </form> 
   </table></div>
</body>
</html>

<?php
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$pass=$_POST['password'];

$sql="insert into users values('$name','$phone','$email','$pass')";
if(mysqli_query($conn,$sql))
{
   
    echo"inserted";
}
else{
    echo"error".mysqli_error($conn);
}

}
mysqli_close($conn);
?>