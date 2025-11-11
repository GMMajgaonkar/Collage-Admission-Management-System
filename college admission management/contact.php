<?php
include("./connections/connection.php");


// Initialize variables for form data
$name = $email = $message = "";
$nameErr = $emailErr = $messageErr = "";

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form inputs
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = sanitize_input($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = sanitize_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["message"])) {
        $messageErr = "Message is required";
    } else {
        $message = sanitize_input($_POST["message"]);
    }

    // Insert data into the database if no errors
    if (empty($nameErr) && empty($emailErr) && empty($messageErr)) {
        $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<script type='text/javascript'>alert('Your message has been sent successfully!');</script>";

           
        } else {
            echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }
    }
}

// Function to sanitize user input
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Engineering College</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
        .container {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="email"], textarea {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        textarea {
            resize: vertical;
            height: 150px;
        }
        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #555;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>
<body>

    <header>
        <h1>Contact Us - [College Name]</h1>
    </header>

    <div class="container">
        <h2>Get in Touch</h2>
        <p>If you have any questions or need assistance, feel free to contact us using the form below.</p>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>
                <span class="error"><?php echo $nameErr; ?></span>
            </div>
            <div class="form-group">
                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
                <span class="error"><?php echo $emailErr; ?></span>
            </div>
            <div class="form-group">
                <label for="message">Your Message:</label>
                <textarea id="message" name="message" required><?php echo $message; ?></textarea>
                <span class="error"><?php echo $messageErr; ?></span>
            </div>
            <input type="submit" value="Send Message">
        </form>
    </div>

</body>
</html>
