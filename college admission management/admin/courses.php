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
            margin-top:11rem;
            padding: 20px;
            background-color:rgb(252, 252, 252);
            box-shadow: 0 2px 10px rgba(1, 1, 1, 1);
            border-radius: 8px;}
            
    </style>
</head>
<body><center>
<div class="container">
<h2><b>Add courses</b></h2>
                <table>
                    <form method='POST'>
                        <tr>
                            <td>course name</td>
                            <td><input type='text' name='course'></td>
                        </tr>
                        <tr>
                            <td><input type='submit' name='submit' value='Add'></td>
                            <td><input type='reset' name='cancel' value='Cancel'></td>
                        </tr>
</form><table></div></center>
</body>
</html>
<?php
 if (isset($_POST['submit'])) {
   
    
    $course = $_POST['course'];
   
    $sql = "INSERT INTO courses( course) VALUES (' $course')";
    if (mysqli_query($conn,$sql )) {
        echo "<script type='text/javascript'>alert('course add successfully');</script>";
        
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
 
mysqli_close($conn);
?>