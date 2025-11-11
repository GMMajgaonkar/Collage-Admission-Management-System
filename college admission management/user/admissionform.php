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
       
    </style>
</head>
<body>
<header>
    <h1>Admission Form</h1>
    <h2 style="color: white">Majgaonkar college of engineering and technology</h2>

</header>
    <div class="container">

<form method="POST" enctype="multipart/form-data">
<div class="form-section">
    <?php
    $sql2="select * from courses";
    $results=mysqli_query($conn,$sql2);
    $nums=mysqli_num_rows($results);
    
    ?>
        Course type :  <select name="course" id="course" required>
        <option value=""></option>
        <?php
        // Check if there are any courses in the database
        if ($nums > 0) {
            // Loop through all courses and display them as options
            while ($rows = mysqli_fetch_assoc($results)) {
                // Check if this course should be preselected (optional)
               
                echo '<option value="' . $rows['course'] . '" >' . $rows['course'] . '</option>';
            }
        }
        ?>
                       <option value="BCA">BCA</option>
                       <option value="BCS">BCS</option>
                       <option value="BSCCS">BSCCS</option>
                       <option value="MCA">MCA</option>
                       <option value="MSC">MSC</option>
                       <option value="B.TECH">B.TECH</option>
                       <option value="M.TECH">M.TECH</option>
                       <option value="MBA">MBA</option>
                       <option value="Civil engineerring">Civil engineerring</option>
                       <option value="Machanical engineerring">Machanical engineerring </option>
                       <option value="Electronic engineerring">Electronic engineerring</option>

                    </select>
    </div>
<hr>
 <h2>Basic Dtails</h2>
        
        <table>

            <tr> <td>Student photo</td>
                 <td><input type="file" name="image1" id="image1" required></td></tr>

            <tr><td>Full name</td>
                 <td><input type="text" name="name" id="name" required></td></tr>
                
            <tr><td>Email address</td>
                <td><input type="email" name="email" id="email" required></td></tr>

            <tr><td>Date of birth</td>
                <td><input type="Date" name="date" id="date" required></td></tr>               

            <tr><td>Gender</td>
                <td><input type="text" name="gender" id="gender" required></td></tr>

            <tr><td>Mobile number</td>
                <td><input type="text" name="mobile" id="mobile" required></td></tr>
                         
            <tr><td>Father name</td>
                <td><input type="text" name="father" id="father" required></td></tr>               

            <tr><td>Mother name</td>
                <td><input type="text" name="mother" id="mother" required></td></tr>
          
            <tr><td>Nationality</td>
                 <td><input type="text" name="nationality" id="nationality" required></td></tr>
                
            <tr><td>Cast</td>
                <td><select name="cast" id="cast" required>
                       <option value="sc">SC</option>
                       <option value="nt">NT</option>
                       <option value="obc">OBC</option>
                       <option value="open">Open</option>
                    </select></td></tr>  
                    
             <tr><td>Corresponds address</td>
             <td><textarea name="caddress" row="2" col="4" id="caddress" required></textarea></td></tr>

             <tr><td>permenant address</td>
                 <td><textarea name="paddress" row="2" col="4" id="paddress" required></textarea></td></tr>
                
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
                 <td><input type="text" name="sboard" required></td>
                 <td><input type="text" name="syear" required></td>
                 <td><input type="text" name="spercentage" required></td>
                 <td><input type="text" name="sstream" required></td></tr>

        <tr><td><b>12th</b></td>
                 <td><input type="text" name="hsboard" required></td>
                 <td><input type="text" name="hsyear" required></td>
                 <td><input type="text" name="hspercentage" required></td>
                 <td><input type="text" name="hsstream" required></td></tr>

        <tr><td><b>Degree (under graduation)</b></td>
                 <td><input type="text" name="uboard" required></td>
                 <td><input type="text" name="uyear" required></td>
                 <td><input type="text" name="upercentage" required></td>
                 <td><input type="text" name="ustream" required></td></tr>

        <tr><td><b>Post graduation (Master)</b></td>
                 <td><input type="text" name="pboard" required></td>
                 <td><input type="text" name="pyear"></td>
                 <td><input type="text" name="ppercentage" required></td>
                 <td><input type="text" name="pstream" required></td></tr>
      </table>
<tr>

<h2>Marksheet & TC</h2>

<table>

<tr> <td>Transfer certificate(TC)</td>
     <td><input type="file" name="image2" id="image2" required></td></tr>

<tr><td>10th Marksheet</td>
      <td><input type="file" name="image3" id="image3" required></td></tr>
    
<tr><td>12th Marksheet</td>
    <td><input type="file" name="image4" id="image4" required></td></tr>

<tr><td>Degree (UG)</td>
    <td><input type="file" name="image5" id="image5" required></td></tr>         

<tr><td>Post graduation</td>
    <td><input type="file" name="image6" id="image6" required></td></tr>
</table>

<hr>

<fieldset>
    <legend>Declaration</legend>
    <p>I hereby declare that all the information provided in this admission form is true to the best of my knowledge. I understand that providing false information or withholding relevant facts may result in the rejection of my application or expulsion from the institution. I authorize the institution to process my personal data as per their privacy policy.</p>
    <p>I agree to abide by the rules and regulations of the institution, should I be admitted.</p>
    <label>
      <input type="checkbox" name="agreement"  required> I agree to the terms and conditions
    </label>
  </fieldset>
  <div class="form-section">
            <label for="sign">Signature:</label>
            <input type="text" name="sign" id="sign" required>
        </div>

        <div class="form-section">
            <input type="submit" name="submit" value="Submit">
        </div>

        
</form>
    


</div>

</body>
</html>
<?php
if(isset($_POST['submit']))
{
    
$course=$_POST['course'];
$name=$_POST['name'];
$email=$_POST['email'];
$birth=$_POST['date'];
$gender=$_POST['gender'];
$mobile=$_POST['mobile'];
$father=$_POST['father'];
$mother=$_POST['mother'];
$nationality=$_POST['nationality'];
$cast=$_POST['cast'];
$caddress=$_POST['caddress'];
$paddress=$_POST['paddress'];
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
$sign=$_POST['sign'];
/*$tc=$_POST['tc'];
$s_mark=$_POST['s_mark'];
$hs_mark=$_POST['hs_mark'];
$ug=$_POST['ug'];
$pg=$_POST['pg'];
$photo=$_POST['photo'];*/

             // Check if the form is submitted

    // Prepare an array for storing the image paths
    $imagePaths = [];

    // Loop through each image input
    for ($i = 1; $i <= 6; $i++) {
        if (isset($_FILES["image$i"]) && $_FILES["image$i"]["error"] == 0) {
            $fileTmpPath = $_FILES["image$i"]["tmp_name"];
            $fileName = $_FILES["image$i"]["name"];
            
           
            
            // Define the directory to store the images
            $uploadDir = 'images/';
            $uploadFilePath = $uploadDir . basename($fileName);
            
            // Move the file to the uploads directory
            if (move_uploaded_file($fileTmpPath, $uploadFilePath)) {
                // Save the file path in the database
                $imagePaths[] = $uploadFilePath;
            } else {
                echo "Error uploading file $fileName.";
            }
        }
    }

if (count($imagePaths) == 6) {
$sql="insert into admissionform(course, name, email, birth, gender, mobile, fathername, mothername, nationality, cast, c_address, p_address, 
s_university, s_year, s_percentage, s_stream, hs_university, hs_year, hs_percentage, hs_stream, ug_university, ug_year, ug_percentage, 
ug_stream, pg_university, pg_year, pg_percentage, pg_stream,signature, tc, s_marksheet, hs_marksheet, ug_marksheet, pg_marksheet, photo)values('$course','$name','$email','$birth','$gender',$mobile,'$father','$mother','$nationality','$cast','$caddress','$paddress','$sboard',$syear,$spercentage,'$sstream','$hsboard',$hsyear,$hspercentage,'$hsstream','$uboard',$uyear,$upercentage,'$ustream','$pboard',$pyear,$ppercentage,'$pstream','$sign','{$imagePaths[1]}','{$imagePaths[2]}','{$imagePaths[3]}','{$imagePaths[4]}','{$imagePaths[5]}','{$imagePaths[0]}')";
if(mysqli_query($conn,$sql))
{
   
    echo "<script type='text/javascript'>alert('Your application has been submitted');</script>";
}
else{
    echo"error".mysqli_error($conn);
}
}else{
    echo "<script type='text/javascript'>alert('please upload all images');</script>";
}


$sql1="select * from admissionform where email='$email'";
$result=mysqli_query($conn,$sql1);
$num=mysqli_num_rows($result);
if($num>0){
$row=mysqli_fetch_assoc($result);
$appli=$row["id"];
$regis=$row["registration_date"];

}

$sql2="insert into application(appli_no,course,username,created_at,status)values('$appli','$course','$name','$regis','pending')";
if(mysqli_query($conn,$sql2))
{
   
    echo "submitted";
}
else{
    echo"error".mysqli_error($conn);
}
}
mysqli_close($conn);
?>