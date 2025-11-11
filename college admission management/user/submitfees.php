<?php
// Include the database connection file
include("../connections/connection.php");

// Start the session
session_start();

// Check if the session variable 'username' exists
if (isset($_SESSION['username'])) {
    echo "Welcome, " . $_SESSION['username'] . "!<br>";
   

    // Fetch application status from the database
    $sql = "SELECT status, fee ,appli_no FROM application WHERE username='" .$_SESSION['username']. "'";
    $result = mysqli_query($conn, $sql);
    $data= mysqli_num_rows($result);
    if ( $data>0) {
        $row = mysqli_fetch_assoc($result);

        // Check if the status is 'selected'
        if ($row['status'] == 'selected') {
            echo "
            <h1>Your application status is: " . $row['status'] . "</h1>
                <h2>Submit Fees for Applied Course</h2>
            <center><div class='container'>
                <table>
                    <form method='POST'>
                        <tr>
                            <td>Payment amount</td>
                            <td><input type='text' name='amount' value=" . $row['fee'] . " disabled></td>
                        </tr>
                        <tr>
                            <td>Mode of Payment</td>
                            <td>
                                <select name='modes' required>
                                    <option value=''>Select mode of Payment</option>
                                    <option value='UPI'>UPI Payment</option>
                                    <option value='debit'>Debit card</option>
                                    <option value='credit'>Credit card</option>
                                    <option value='e-wallet'>E-wallet Payment</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Transaction number</td>
                            <td><input type='text' name='transaction' required></td>
                        </tr>
                        <tr>
                            <td>Date of Transaction</td>
                            <td><input type='date' name='dt' required></td>
                        </tr>
                        <tr>
                            <td><input type='submit' name='submit' value='Submit Fees'></td>
                            <td><input type='reset' name='cancel' value='Cancel'></td>
                        </tr>
                    </form>
                </table>
             </div></center>";

            // Handle form submission
            if (isset($_POST['submit'])) {
                // Sanitize form input to prevent SQL injection
                
                $mode = $_POST['modes'];
                $transactions =$_POST['transaction'];
                $transaction_date = $_POST['dt'];

                // Insert payment data into the database
                $sql_insert = "UPDATE application 
                SET mode_of_payment='$mode', 
                    transaction_number='$transactions', 
                    transaction_date='$transaction_date', 
                    fees_status='1' 
                WHERE appli_no='".$row['appli_no']."'";

                 if (mysqli_query($conn, $sql_insert)) {
                    echo "Payment details submitted successfully!
                     <button><a href='feeshow.php?id=" . urlencode($row['appli_no']) . "'>view</a></button>";
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            }
        } else {
            echo "<h1>Your application status is: " . $row['status'] . "</h1>";
        }
    } else {
        echo "No application status found.";
    }
} else {
    echo "No session data found. Please log in.";
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Fees</title>
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

        input[type="submit"],input[type="reset"],input[type="reset"],select {
            margin-top: 15px;
        }
        table {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
        }
        .container {
            width: 30%;
            margin-top:4rem;
            padding: 20px;
            background-color:rgb(229, 239, 241);
            box-shadow: 0 2px 10px rgba(1, 1, 1, 1);
            border-radius: 8px;}
            
    </style>
    </style>
</head>
<body>

   
</body>
</html>
