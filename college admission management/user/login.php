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
   
    <tr><td>user</td><td><input type="text" name="username"></td></tr>
    <tr><td>Password</td><td><input type="text" name="password"></td></tr>
    <tr><td><input type="submit" value="submit" name="submit"></td>
    <td><input type="reset" value="Cancel" name="cancel">
     <a href="http://localhost/college%20admission%20management/user/register.php"> DO register</a></td></tr>
   
   </form> 
   </table></div>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
$name=$_POST['username'];
$pass=$_POST['password'];

$sql="select name,password from users";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0)
{
 while($row=mysqli_fetch_assoc($result))
  {
    if($name==$row["name"] && $pass==$row["password"])
    {
      session_start();

// Set session variables
$_SESSION['username'] =$row["name"];


// Redirect or display confirmation message
     echo "Session variables are set.";
      echo "<script type='text/javascript'>alert('registration successfully');</script>";

     header("Location: http://localhost/college%20admission%20management/user/udashboard.php");

     exit();


    }
  
  }
 
echo "<script type='text/javascript'>alert('plz do register');</script>";


  }
}
mysqli_close($conn);
?>