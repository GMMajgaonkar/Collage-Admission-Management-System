<?php
include("../connections/connection.php");

session_start();



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
        input[type="text"]{
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
            margin-top:2rem;
            margin-left:30rem;
            padding: 20px;
            background-color:rgb(252, 252, 252);
            box-shadow: 0 2px 10px rgba(1, 1, 1, 1);
            border-radius: 8px;}
            
    </style>
       
    
</head>
<body>

<h1>Student profile</h1>
<hr> 
    


</body>
</html>

<?php
// Check if the session variable 'username' exists
if (isset($_SESSION['username'])) {
    echo "Welcome, " . $_SESSION['username'] . "!<br>";
$sql="select * from users where name='" . $_SESSION['username'] . "'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
$row=mysqli_fetch_assoc($result);
  
echo "<div class='container'><table>
<form method='POST'>
    <tr>
        <td>Full Name:</td>
        <td><input type='text' name='full' value='" .$row['name']."'></td>
    </tr>
    <tr>
        <td>Email ID:</td>
        <td><input type='text' name='id' value='" .$row['email_id'] ."'></td>
    </tr>
    <tr>
        <td>Phone Number:</td>
        <td><input type='text' name='phon' value='" .$row['phone_no'] ."'></td>
    </tr>
    <tr>
        <td>Password:</td>
        <td><input type='text' name='pass' value='" .$row['password'] ."'></td>
    </tr>
    <tr>
        <td><input type='submit' name='submit' value='update'></td>
        <td><input type='reset' name='cancel' value='Cancel'></td>
    </tr>
</form>
</table></div>";

    }
   
    if(isset($_POST['submit']))
    {
      $name=$_POST['full'];
      $email=$_POST['id'];
      $phone=$_POST['phon'];
      $password=$_POST['pass'];
      $sql="update users set name='$name' , phone_no='$phone', email_id='$email', password='$password'  where name='" . $_SESSION['username'] . "'";
      if(mysqli_query($conn,$sql))
      {
          echo"update";
      }
      else{
          echo "error".mysqli_error($conn);
}
}
      }
    



mysqli_close($conn);
?>