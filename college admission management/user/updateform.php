<?php
include("../connections/connection.php");
if (isset($_GET['message'])) {
    $message = $_GET['message']; // Fetch the message passed via URL
    echo "Message received: " . $message;

if ($message && isset($_POST['submit'])) {
    // Fetch form data
    $course = $_POST['course'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $father = $_POST['father'];
    $mother = $_POST['mother'];
    $nationality = $_POST['nationality'];
    $cast = $_POST['cast'];
    $caddress = $_POST['caddress'];
    $paddress = $_POST['paddress'];
    $sign = $_POST['sign'];
    $sboard=$_POST['sboard'];
    $syear=$_POST['syear'];
    $spercentage=$_POST['spercentage'];
    $sstream=$_POST['sstream'];
    $hsboard=$_POST['hsboard'];
    $hsyear=$_POST['hsyear'];
    $hspercentage=$_POST['hspercentage'];
    $hsstream=$_POST['hsstream'];
    $uboard=$_POST['uboard'];
    $uyear=$_POST['uyear'];
    $upercentage=$_POST['upercentage'];
    $ustream=$_POST['ustream'];
    $pboard=$_POST['pboard'];
    $pyear=$_POST['pyear'];
    $ppercentage=$_POST['ppercentage'];
    $pstream=$_POST['pstream'];


    // Handle file uploads
    $image1 = $_FILES['image1']['name'];
    $image2 = $_FILES['image2']['name'];
    $image3 = $_FILES['image3']['name'];
    $image4 = $_FILES['image4']['name'];
    $image5 = $_FILES['image5']['name'];
    $image6 = $_FILES['image6']['name'];

    // Move uploaded files to a directory (Make sure the "uploads" folder exists and is writable)
    move_uploaded_file($_FILES['image1']['tmp_name'], "images/".$image1);
    move_uploaded_file($_FILES['image2']['tmp_name'], "images/".$image2);
    move_uploaded_file($_FILES['image3']['tmp_name'], "images/".$image3);
    move_uploaded_file($_FILES['image4']['tmp_name'], "images/".$image4);
    move_uploaded_file($_FILES['image5']['tmp_name'], "images/".$image5);
    move_uploaded_file($_FILES['image6']['tmp_name'], "images/".$image6);
   

    // SQL query to update the record
    $sql = "UPDATE admissionform SET 
            course='$course', 
            name='$name', 
            email='$email', 
            birth='$date', 
            gender='$gender', 
            mobile='$mobile', 
            fathername='$father', 
            mothername='$mother', 
            nationality='$nationality', 
            cast='$cast', 
            c_address='$caddress', 
            p_address='$paddress',
            photo='$image1', 
            tc='$image2', 
            s_marksheet='$image3', 
            hs_marksheet='$image4', 
            ug_marksheet='$image5', 
            pg_marksheet='$image6', 
            signature='$sign',
            s_university='$sboard',
            s_year='$syear',
            s_percentage='$spercentage',
            s_stream='$sstream',
            hs_university='$hsboard',
            hs_year='$hsyear',
            hs_percentage='$hspercentage',
            hs_stream='$hsstream',
            ug_university='$uboard',
            ug_year='$uyear',
            ug_percentage='$upercentage',
            ug_stream='$ustream',
            pg_university='$pboard',
            pg_year='$pyear',
            pg_percentage='$ppercentage',
            pg_stream='$pstream'
            WHERE id='$message'";


    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    $sql2="update application set course='$course' , username='$name' where appli_no=$message";
    if (mysqli_query($conn, $sql2)) {
        echo "appication updated";
    } else {
        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
    }
}

// Fetch existing data for the form
if($message){
$sql = "SELECT * FROM admissionform WHERE id=$message";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
}
} else {
    echo "No message received.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        header {
            background-color: #4CAF50;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color:rgb(252, 252, 252);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h2 {
            color: #333;
        }
        table {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
        }
        td {
            padding: 8px;
            text-align: left;
        }
        input[type="text"], input[type="email"], input[type="date"], input[type="file"], select, textarea {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        textarea {
            resize: vertical;
        }
        input[type="submit"], input[type="checkbox"] {
            margin-top: 15px;
        }
        hr {
            border: 1px solid #ccc;
        }
        fieldset {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
        }
        legend {
            font-weight: bold;
        }
        .form-section {
            margin-bottom: 20px;
        }
        .form-section label {
            font-weight: bold;
        }
    </style>
</head>
<body>
<header>
    <h1>Admission Form</h1>
</header>

<div class="container">
    <form method="POST" enctype="multipart/form-data">
        <div class="form-section">
            Course type:  
            <select name="course" id="course" required>
                <option value="<?= $row['course']; ?>"><?= $row['course']; ?></option>
                <option value="BCA">BCA</option>
                <option value="BCS">BCS</option>
                <option value="BSCCS">BSCCS</option>
                <option value="MCA">MCA</option>
                <option value="MSC">MSC</option>
                <option value="B.TECH">B.TECH</option>
                <option value="M.TECH">M.TECH</option>
                <option value="MBA">MBA</option>
                <option value="Civil engineering">Civil engineering</option>
                <option value="Mechanical engineering">Mechanical engineering</option>
                <option value="Electronic engineering">Electronic engineering</option>
            </select>
        </div>
        <hr>
        <h2>Basic Details</h2>
        <table>
            <tr><td>Student photo</td>
                <td><input type="file" name="image1" id="image1" value="<?= $row['photo']; ?>" required></td></tr>
            <tr><td>Full name</td>
                <td><input type="text" name="name" id="name" value="<?= $row['name']; ?>" required></td></tr>
            <tr><td>Email address</td>
                <td><input type="email" name="email" id="email" value="<?= $row['email']; ?>" required></td></tr>
            <tr><td>Date of birth</td>
                <td><input type="Date" name="date" id="date" value="<?= $row['birth']; ?>" required></td></tr>
            <tr><td>Gender</td>
                <td><input type="text" name="gender" id="gender" value="<?= $row['gender']; ?>" required></td></tr>
            <tr><td>Mobile number</td>
                <td><input type="text" name="mobile" id="mobile" value="<?= $row['mobile']; ?>" required></td></tr>
            <tr><td>Father's name</td>
                <td><input type="text" name="father" id="father" value="<?= $row['fathername']; ?>" required></td></tr>
            <tr><td>Mother's name</td>
                <td><input type="text" name="mother" id="mother" value="<?= $row['mothername']; ?>" required></td></tr>
            <tr><td>Nationality</td>
                <td><input type="text" name="nationality" id="nationality" value="<?= $row['nationality']; ?>" required></td></tr>
            <tr><td>Cast</td>
                <td><select name="cast" id="cast" required>
                    <option value="<?= $row['cast']; ?>"><?= $row['cast']; ?></option>
                    <option value="sc">SC</option>
                    <option value="nt">NT</option>
                    <option value="obc">OBC</option>
                    <option value="open">Open</option>
                </select></td></tr>
            <tr><td>Correspondence address</td>
                <td><textarea name="caddress" id="caddress" required><?= $row['c_address']; ?></textarea></td></tr>
            <tr><td>Permanent address</td>
                <td><textarea name="paddress" id="paddress" required><?= $row['p_address']; ?></textarea></td></tr>
        </table>
        <hr>
        <h2>Education Qualification</h2>
      <table>
        <tr>
        <th> </th>
        <th>Board university</th>
        <th>Year</th>
        <th>Percentage</th>
        <th>Stream</th>
        </tr>

         <tr><td><b>10th</b></td>
                 <td><input type="text" name="sboard" value="<?= $row['s_university']; ?>" required></td>
                 <td><input type="text" name="syear" value="<?= $row['s_year']; ?>" required></td>
                 <td><input type="text" name="spercentage" value="<?= $row['s_percentage']; ?>" required></td>
                 <td><input type="text" name="sstream" value="<?= $row['s_stream']; ?>" required></td></tr>

        <tr><td><b>12th</b></td>
                 <td><input type="text" name="hsboard" value="<?= $row['hs_university']; ?>" required></td>
                 <td><input type="text" name="hsyear" value="<?= $row['hs_year']; ?>" required></td>
                 <td><input type="text" name="hspercentage" value="<?= $row['hs_percentage']; ?>" required></td>
                 <td><input type="text" name="hsstream" value="<?= $row['hs_stream']; ?>" required></td></tr>

        <tr><td><b>Degree (under graduation)</b></td>
                 <td><input type="text" name="uboard" value="<?= $row['ug_university']; ?>" required></td>
                 <td><input type="text" name="uyear" value="<?= $row['ug_year']; ?>" required></td>
                 <td><input type="text" name="upercentage" value="<?= $row['ug_percentage']; ?>" required></td>
                 <td><input type="text" name="ustream" value="<?= $row['ug_stream']; ?>" required></td></tr>

        <tr><td><b>Post graduation (Master)</b></td>
                 <td><input type="text" name="pboard" value="<?= $row['pg_university']; ?>" required></td>
                 <td><input type="text" name="pyear" value="<?= $row['pg_year']; ?>" required></td>
                 <td><input type="text" name="ppercentage" value="<?= $row['pg_percentage']; ?>" required></td>
                 <td><input type="text" name="pstream" value="<?= $row['pg_stream']; ?>" required></td></tr>
      </table>
      <hr>
        <h2>Marksheet & TC</h2>
        <table>
            <tr><td>Marksheet for 10th</td>
                <td><input type="file" name="image3" id="image3" value="<?= $row['s_marksheet']; ?>" required></td></tr>
            <tr><td>Marksheet for 12th</td>
                <td><input type="file" name="image4" id="image4" value="<?= $row['hs_marksheet']; ?>" required></td></tr>
            <tr><td>UG Marksheet</td>
                <td><input type="file" name="image5" id="image5" value="<?= $row['ug_marksheet']; ?>" required></td></tr>
            <tr><td>PG Marksheet</td>
                <td><input type="file" name="image6" id="image6" value="<?= $row['pg_marksheet']; ?>" required></td></tr>
            <tr><td>Transfer Certificate (TC)</td>
                <td><input type="file" name="image2" id="image2" value="<?= $row['tc']; ?>" required></td></tr>
        </table>
        <hr>
        <div class="form-section">
            <label for="sign">Signature</label>
            <input type="text" name="sign" id="sign" value="<?= $row['signature']; ?>" required>
        </div>
        
        <div class="form-section">
            <input type="submit" name="submit" value="Update Admission">
        </div>
    </form>
</div>

</body>
</html>
