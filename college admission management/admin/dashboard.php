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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<style>
  /* Flex container for all sections */
.container {
    display: flex;
    flex-wrap: wrap;  /* Allow items to wrap onto new lines if needed */
    justify-content: space-around; /* Space items evenly with equal space around them */
    gap: 20px; /* Adds space between flex items */
    margin-top:40px;
}

/* Style for each section */
.container > div {
    background-color: #f2f2f2; /* Light background color */
    border: 1px solid #ccc; /* Border for each section */
    padding: 20px;
    border-radius: 8px; /* Rounded corners */
    width: 220px; /* Fixed width for each block */
    text-align: center; /* Center the content */
    box-sizing: border-box; /* Include padding and border in the element's total width and height */
}

/* Styling for the headings */
.container h3 {
    color: #333;
    font-size: 18px;
    margin-bottom: 10px;
}

/* Style for the paragraphs with counts */
.container p {
    font-size: 16px;
    color: #555;
    font-weight: bold;
}

/* Specific styling for each block to differentiate them */
.pending {
    background-color: #f8d7da; /* Light red for pending */
}

.selected {
    background-color: #d4edda; /* Light green for selected */
}

.reject {
    background-color: #fff3cd; /* Light yellow for rejected */
}

.total {
    background-color: #d1ecf1; /* Light blue for total */
}

</style>
  </head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary" class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid" >
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="application.php">Admission Application</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="report.php">Report</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="search.php">Search Application</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="courselist.php">Courses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="registerusers.php">Register users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="enquiry.php">Enquiry</a>
        </li>
       
       
      </ul>
    </div>
  </div>
</nav>
</body>
</html>
<?php
// Your connection setup to the database
$sql = "SELECT status, COUNT(*) as total FROM application WHERE status IN ('selected', 'rejected', 'pending') GROUP BY status";
$result = mysqli_query($conn, $sql);

// Initialize counters for each status
$selected = $rejected = $pending = 0;

if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        if($row['status'] == 'selected') {
            $selected = $row['total'];
        } elseif($row['status'] == 'rejected') {
            $rejected = $row['total'];
        } elseif($row['status'] == 'pending') {
            $pending = $row['total'];
        }

        $total=$selected+$rejected+$pending;
    }

    // Displaying the application counts
    echo "<div class='container'>
    <div class='total'>
            <h3>Total applications</h3>
            <p> $total</p>
          </div>

    <div class='pending'>
            <h3>Pending applications</h3>
            <p>$pending</p>
          </div>

    <div class='selected'>
            <h3>Selected applications</h3>
            <p>$selected</p>
          </div>

    <div class='reject'>
            <h3>Rejected applications</h3>
            <p>$rejected</p>
          </div>";
}
?>
