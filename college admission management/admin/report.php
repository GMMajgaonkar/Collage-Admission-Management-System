<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #f4f4f4;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
        .container {
            width: 80%;
            margin-top:2rem;
            margin-left:6rem;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<form method="POST">
    <label for="n">From Date</label>
    <input type="text" id="n" name="n" required>
    
    <label for="n1">To Date</label>
    <input type="text" id="n1" name="n1" required>
    
    <input type="submit" name="submit" value="Submit">
    <input type="reset" name="cancel" value="Cancel">
</form>

<?php
include("../connections/connection.php");

if (isset($_POST['submit'])) {
   

        // Get dates from form
        $from = $_POST['n'];
        $to = $_POST['n1'];

        // Sanitize the dates
        $from = mysqli_real_escape_string($conn, $from);
        $to = mysqli_real_escape_string($conn, $to);

        // Query to fetch applications between the date range
        $sql = "SELECT * FROM application WHERE created_at BETWEEN '$from' AND '$to'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);

        if ($num > 0) {
            echo "<div class='container'>
                    <h2>Applications</h2>
                    <table>
                        <tr>
                            <th>SL No.</th>
                            <th>Application No.</th>
                            <th>Course Name</th>
                            <th>User Name</th>
                            <th>Created At</th>
                            <th>Status</th>
                            <th>fees</th>
                        </tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>" . $row["sl_no"] . "</td>
                        <td>" . $row["appli_no"] . "</td>
                        <td>" . $row["course"] . "</td>
                        <td>" . $row["username"] . "</td>
                        <td>" . $row["created_at"] . "</td>
                        <td>" . $row["status"] . "</td>
                        <td><button><a href='fees.php?message=" . urlencode($row["appli_no"])."'>View</a></button></td>
                      </tr>";
            }

            echo "</table></div>";
        } else {
            echo "<p>No applications found within the selected date range.</p>";
        }
    }


mysqli_close($conn);
?>
</body>
</html>
