<?php
include("../connections/connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
          .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 800px;
            overflow-x: auto;
            margin: 220px;

            body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;}

            form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        form input[type="email"] {
            padding: 10px;
            margin-right: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ddd;
            width: 300px;
        }

        form input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        form input[type="submit"]:hover {
            background-color: #45a049;
        }

       
    </style>
   
</head>
<body>
<div class="container">
    <form action="show.php" method="POST">
        Enter email_id: <input type="email" name="email">
        <input type="submit" name="submit" value="submit">
    </form>
    </div>
</body>
    </html>