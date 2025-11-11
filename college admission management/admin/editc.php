<?php
include("../connections/connection.php");





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

<h1>Course edit</h1>
<hr> 
    


</body>
</html>

<?php
// Check if the session variable 'username' exists
if (isset($_GET['message'])) {
    $message = $_GET['message']; // Fetch the message passed via URL
    echo "Message received: " . $message;

$sql="select * from courses where cid=$message";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
$row=mysqli_fetch_assoc($result);
  
echo "<div class='container'><table>
<form method='POST'>
    <tr>
        <td>course id:</td>
        <td><input type='text' name='id' value='" .$row['cid']."'></td>
    </tr>
    <tr>
        <td>course name:</td>
        <td><input type='text' name='course' value='" .$row['course'] ."'></td>
    </tr>
   
        <td><input type='submit' name='submit' value='update'></td>
        <td><input type='reset' name='cancel' value='Cancel'></td>
    </tr>
</form>
</table></div>";

    }
   
    if(isset($_POST['submit']))
    {
      $course=$_POST['course'];
      $id=$_POST['id'];
      
      $sql="update courses set  course='$course'  where cid=$message";
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