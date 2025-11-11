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
    <form method="POST"><lable>Search Application</label><input type="search" name="n">
<input type="submit" name="submit" value="submit">
<input type="reset" name="cancel" value="cancel"></form>
</body>
</html>

<?php
include("../connections/connection.php");
if (isset($_POST['submit'])) {
   
    
    $appli = $_POST['n'];
   
$sql="select * from application where appli_no=$appli";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
   
    
while($row=mysqli_fetch_assoc($result))
{ echo" <div class='container'>
    <h2>applications</h2>
<table border=strong>
     <tr><th>sl.no</th>
         <th>appli.no</th>
         <th>course name</th>
         <th>user name</th>
         <th>created at</th>
         <th>status</th>
         <th>Action</th></tr>

     <tr><td>". $row["sl_no"] . "</td>
          <td>". $row["appli_no"] . "</td>
          <td>". $row["course"] . "</td>
          <td>". $row["username"] . "</td>
          <td>". $row["created_at"] . "</td>
          <td>". $row["status"] . "</td>
          <td><button><a href='viewapplication.php?message=" . urlencode($row['appli_no']) . "'>view</a></button></td></tr>";

              
        }
        echo "</table></div>";
    } else {
        echo "<p>No applications found.</p>";
    }  
}
    mysqli_close($conn);         
?>