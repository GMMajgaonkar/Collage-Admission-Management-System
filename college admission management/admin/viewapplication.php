<?php
include("../connections/connection.php");

if (isset($_GET['message'])) {
    $message = $_GET['message']; // Fetch the message passed via URL

    // Sanitize the input to prevent SQL Injection
    $message = mysqli_real_escape_string($conn, $message);

    // Fetch application details from the database
    $sql = "SELECT * FROM admissionform WHERE id='$message'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    
    if ($num > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <div class='container'>
            <h2>Admission form</h2>
            <h2>Majgaonkar college of engineering and technology</h2>
            <table border='1'>
                <tr><th>Application no : ". $row["id"] ."</th></tr>
            </table>

            <h3>Personal Details</h3>
            <table border='1'>
                <tr><td>Application name : </td><td>". $row["name"] ."</td><td>Profile : </td><td><img src='http://localhost/college%20admission%20management/user/images/" . $row["photo"] . "' width='100'></td></tr>
                <tr><td>Application email : </td><td>". $row["email"] . "</td><td>Registration date : </td><td>". $row["registration_date"] . "</td></tr>
                <tr><td>Course applied : </td><td>". $row["course"] . "</td><td>Date of Birth : </td><td>". $row["birth"] . "</td></tr>
                <tr><td>Gender : </td><td>". $row["gender"] . "</td><td>Mobile no : </td><td>". $row["mobile"] . "</td></tr>
                <tr><td>Father's name : </td><td>". $row["fathername"] . "</td><td>Mother's name : </td><td>". $row["mothername"] . "</td></tr>
                <tr><td>Nationality : </td><td>". $row["nationality"] . "</td><td>Caste : </td><td>". $row["cast"] . "</td></tr>
                <tr><td>Correspondence Address : </td><td>". $row["c_address"] . "</td><td>Permanent Address : </td><td>". $row["p_address"] . "</td></tr>
                <tr><td>TC : </td><td><a href='http://localhost/college%20admission%20management/user/images/" . $row["tc"] . "' width='100'>view</a></td>
                <td>10th marksheet : </td><td><a href='http://localhost/college%20admission%20management/user/images/" . $row["s_marksheet"] . "' width='100'>view</a></td></tr>
                <tr><td>12th marksheet : </td><td><a href='http://localhost/college%20admission%20management/user/images/" . $row["hs_marksheet"] . "' width='100'>view</a></td>
                <td>Degree : </td><td><a href='http://localhost/college%20admission%20management/user/images/" . $row["ug_marksheet"] . "' width='100'>view</a></td></tr>
                <tr><td>Post Degree : </td><td><a href='http://localhost/college%20admission%20management/user/images/" . $row["pg_marksheet"] . "' width='100'>view</a></td>
                <td>Registration Date : </td><td>". $row["registration_date"] . "</td></tr>
            </table>

            <h3>Education Details</h3>
            <table border='1'>
                <tr><th>#</th><th>University/Board</th><th>Year</th><th>Percentage</th><th>Stream</th></tr>
                <tr><td>10th Marks</td><td>". $row["s_university"] . "</td><td>". $row["s_year"] . "</td><td>". $row["s_percentage"] . "</td><td>". $row["s_stream"] . "</td></tr>
                <tr><td>12th Marks</td><td>". $row["hs_university"] . "</td><td>". $row["hs_year"] . "</td><td>". $row["hs_percentage"] . "</td><td>". $row["hs_stream"] . "</td></tr>
                <tr><td>UG Marks</td><td>". $row["ug_university"] . "</td><td>". $row["ug_year"] . "</td><td>". $row["ug_percentage"] . "</td><td>". $row["ug_stream"] . "</td></tr>
                <tr><td>PG Marks</td><td>". $row["pg_university"] . "</td><td>". $row["pg_year"] . "</td><td>". $row["pg_percentage"] . "</td><td>". $row["pg_stream"] . "</td></tr>
            </table>

            <h3>Declaration</h3>
            <table border='1'>
                <tr><td>Signature : " . $row["signature"] . "</td></tr>
            </table>
            ";
        }
    } else {
        echo "No records found.";
    }

    // Now handle the status update form
    echo "<h2>Application Status</h2>
    <form method='POST' id='formhide'>
        Application Status: <select name='status'>
            <option value=''></option>
            <option value='pending'>pending</option>
            <option value='selected'>selected</option>
            <option value='rejected'>rejected</option>
        </select><br>
        Fee Amount: <input type='text' name='fee'><br>
        Application Remark: <input type='text' name='remark'><br>
        <input type='submit' name='submit' value='Update'>
    </form>

    ";

    if (isset($_POST['submit'])) {
        $status = $_POST['status'];
        $fee = $_POST['fee'];  // If fee is needed, handle it
        $remark = $_POST['remark']; // If remark is needed, handle it

        // Sanitize and validate inputs
        $status = mysqli_real_escape_string($conn, $status);
        $fee = mysqli_real_escape_string($conn, $fee);
        $remark = mysqli_real_escape_string($conn, $remark);

        // Ensure status is not empty
        if (empty($status)) {
            echo "Please select a status.";
        } else {
            // Update query (fix the issue with query formatting)
            $sql1 = "UPDATE application SET status='$status', fee='$fee', remark='$remark' WHERE appli_no='$message'";

            if (mysqli_query($conn, $sql1)) {
                // Hide the form (via JavaScript)
                echo "<script>document.getElementById('formhide').style.display='none'</script>";
            
                // Display updated information
                echo "Application Status: " . $status . "<br>";
                echo "Application Fees: " . $fee . "<br>";
                echo "Application Remark: " . $remark . "<br>";
            
                // Query to fetch the updated row
                $sql = "SELECT * FROM application WHERE appli_no='$message'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
            
                // Check fees status
                if ($row['fees_status'] !=='0') {
                    echo "Fees status: paid<br>";
                } else {
                    echo "Fees status: not paid<br>";
                }
            
                // Button with link to view the fees page
                echo "<button><a href='fees.php?message=" . urlencode($message) . "'>View</a></button>";
            } else {
                // In case of an error in the update query
                echo "Error: " . mysqli_error($conn);
            }
            
        }
    }
    echo "</div>";
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
          .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 1000px;
            overflow-x: auto;
            margin-left :100px;
            margin-top :auto;}
        

            body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;}

          

        table {
            width: 100%;
            border-collapse: collapse;
            
            margin-top: 20px;
        }

        table th, table td {
            padding: 15px 25px;
            text-align: left;
            border-bottom: 1px solid ;
            margin-right:8px;
        }

        table th {
           
            color: black;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        img {
            width: 100px;
            height: auto;
            border-radius: 5px;
            border: 2px solid black;
        }

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
        h2 {
    color: #333;
    margin-bottom: 20px;
    text-align: center;}

    input[type="text"],select{
            width: 20%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"],select {
            margin-top: 15px;
        }
    </style>
</head>
<body>
    
</body>
</html>
