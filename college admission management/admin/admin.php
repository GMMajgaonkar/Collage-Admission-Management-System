<?php
include("../connections/connection.php");
//include($_SERVER['DOCUMENT_ROOT'] . '/college admission management/index.php');
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
            width: 30%;
            margin-top:11rem;
            padding: 20px;
            background-color:rgb(252, 252, 252);
            box-shadow: 0 2px 10px rgba(1, 1, 1, 1);
            border-radius: 8px;}
            
    </style>
       
</head>
<body>
<div class="container"><table>
   <form method="POST">
   
    <tr><td>Admin</td><td><input type="text" name="adminname"></td></tr>
    <tr><td>Password</td><td><input type="password" name="password"></td></tr>
    <tr><td><input type="submit" value="submit" name="submit"></td><td><input type="reset" value="Cancel" name="cancel"></td></tr>
   
   </form> 
   </table></div>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
$name=$_POST['adminname'];
$pass=$_POST['password'];
if($name=="Admin" && $pass=="1234"){
    header("Location:http://localhost/college%20admission%20management/admin/dashboard.php");
    exit();
}
else{
    header("Location: http://localhost/college%20admission%20management/home.php");
    exit();
}

}
mysqli_close($conn);
?>