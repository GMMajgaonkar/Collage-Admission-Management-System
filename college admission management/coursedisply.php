<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Flex container for displaying all sections */
        .container {
            display: flex;
            flex-wrap: wrap;  /* Allow items to wrap onto new lines if needed */
            justify-content: space-between; /* Space items evenly */
           margin: 55px;
            gap: 25px;
            
        }

        /* Style for each section (course box) */
        .container > div {
            background-color: #f2f2f2; /* Light background color */
            border: 1px solid #ccc; /* Border for each section */
            padding: 20px;
            border-radius: 8px; /* Rounded corners */
            width: 21%; /* 4 items per row, roughly 22% width */
            text-align: center; /* Center the content */
            box-sizing: border-box; /* Include padding and border in the element's total width and height */
            margin: 0; /* Remove margin between boxes */
           
            
        }

        /* Styling for the headings */
        .container h3 {
            color: #333;
            font-size: 18px;
            margin-bottom: 10px;
        }

        /* Style for the paragraphs with course names */
        .container p {
            font-size: 16px;
            color: #555;
            font-weight: bold;
        }

        /* Special style for the total section */
        .total {
            background-color: #f2f2f2; /* Light blue for total */
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .container > div {
                width: 45%; /* 2 items per row on medium-sized screens */
            }
        }

        @media (max-width: 768px) {
            .container > div {
                width: 90%; /* 1 item per row on smaller screens */
            }
        }
    </style>
</head>
<body>

<?php
include("./connections/connection.php");
include('index.php');


// SQL query to fetch all courses from the courses table
$sql = "SELECT * FROM courses";
$result = mysqli_query($conn, $sql);

// Check if any rows are returned from the query
if (mysqli_num_rows($result) > 0) {
    echo "<div class='container'>";
    // Loop through each row of the result
    while ($row = mysqli_fetch_assoc($result)) {
        // Display course details in a flex container
        echo "<div>
                <div class='total'>
                    <h3>Course Name</h3>
                    <p>" . htmlspecialchars($row['course']) . "</p>
                </div>
              </div>";
    }
    echo "</div>"; // Closing the flex container
} else {
    echo "<p>No courses found.</p>";
}

// Close the database connection
mysqli_close($conn);
?>

</body>
</html>
