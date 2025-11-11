<?php
include("../connections/connection.php");
if (isset($_GET['message'])) {
    $message = $_GET['message']; // Fetch the message passed via URL
    echo "Message received: " . $message;


if($message){
$sql = "SELECT * FROM application WHERE appli_no=$message";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

echo"<div class='container'>
<b>payment information</b><table>
<tr><td>user name : </td>
    <td>".$row['username']."</td></tr>
<tr><td>application no</td>
    <td>".$row['appli_no']."</td></tr>

<tr><td>mode_of_payment</td>
    <td>".$row['mode_of_payment']."</td></tr>
<tr><td>Transaction_number</td>
    <td>".$row['transaction_number']."</td></tr>
    <tr><td>Transaction_date</td>
    <td>".$row['transaction_date']."</td></tr>
    <tr><td>Fee</td>
    <td>".$row['fee']."</td></tr>";
    if ($row['fees_status'] !=='0') {
        echo "<tr><td>Fees status:</td> <td>paid</td></tr>";
    } else {
        echo "<tr><td>Fees status:</td> <td> not paid</td></tr>";
    }
    $sql1 = "SELECT * FROM users WHERE name='".$row['username']."'";
$result1 = mysqli_query($conn, $sql1);
$rows = mysqli_fetch_assoc($result1);
echo" <tr><td><b>User information</b></td></tr>
<tr><td>user name : </td>
    <td>".$rows['name']."</td></tr>
<tr><td>email</td>
    <td>".$rows['email_id']."</td></tr>

<tr><td>mobile no</td>
    <td>".$rows['phone_no']."</td></tr>
</table> </div>


<div class='button-container'>
<button onclick='window.print()'>Print Form</button></div>
";
}
} else {
    echo "No message received.";
}
mysqli_close($conn);         

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            color:white;
        }

        .button-container button {
            padding: 12px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .button-container button:hover {
            background-color: #45a049;
        }
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
            background-color:rgb(229, 239, 241);
            box-shadow: 0 2px 10px rgba(1, 1, 1, 1);
            border-radius: 8px;
        text-transform:capitalize;}
            </style>

</head>
<body>
    
</body>
</html>