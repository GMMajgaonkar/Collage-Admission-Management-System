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
            max-width: 1000px;
            overflow-x: auto;
            margin-left :160px;

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
    </style>
   
</head>
<body>

</html>
<?php

if(isset($_POST['submit']))
{
    $email=$_POST['email'];

$sql="select * from admissionform where email='$email'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
    
    
while($row=mysqli_fetch_assoc($result))
{ echo"
    <div class='container'>
    <h2>Admission form</h2>
        <h2>Majgaonkar college of engineering and technology</h2>

<table border=strong>
    <tr><th>Application no : 
                ". $row["id"] ."</th></tr></table>

<h3>Personal Details</h3>
                <table border=strong>
                <tr><td>Applicat name : </td>
                <td>". $row["name"] ."</td><td>Profile : </td> <div><td><img src='http://localhost/college%20admission%20management/user/images/" . $row["photo"] . "' width='100'></td> </tr>
              
     <tr><td>Applicat email : </td><td>". $row["email"] . "</td><td>Registration date : </td><td>". $row["registration_date"] . "</td></tr>
     <tr><td>Course applied : </td><td>". $row["course"] . "</td><td>dob : </td><td>". $row["birth"] . "</td></tr>
     <tr><td>gender : </td><td>". $row["gender"] . "</td><td>mobile no : </td><td>". $row["mobile"] . "</td></tr>
     <tr><td>father name : </td><td>". $row["fathername"] . "</td><td>mother name : </td><td>". $row["mothername"] . "</td></tr>
     <tr><td>nationality  : </td><td>". $row["nationality"] . "</td><td>cast : </td><td>". $row["cast"] . "</td></tr>
     <tr><td>correspond address : </td><td>". $row["c_address"] . "</td><td>permanent address : </td><td>". $row["p_address"] . "</td></tr>
    
                <tr><td>tc : </td> <td><a href='http://localhost/college%20admission%20management/user/images/" . $row["tc"] . "' width='100'>view</a></td> 
                <td>10th marksheet : </td> <td><a href='http://localhost/college%20admission%20management/user/images/" . $row["s_marksheet"] . "' width='100'>view</a></td> </tr>
              
                <tr><td>12th marksheet : </td> <td><a href='http://localhost/college%20admission%20management/user/images/" . $row["hs_marksheet"] . "' width='100'>view</a></td> 
                </td><td>degree: </td> <td><a href='http://localhost/college%20admission%20management/user/images/" . $row["ug_marksheet"] . "' width='100'>view</a></td></tr>
              
                <tr><td>post degree : </td> <td><a href='http://localhost/college%20admission%20management/user/images/" . $row["pg_marksheet"] . "' width='100'>view</a></td><td>Registration date</td><td>". $row["registration_date"] . "</td></tr>
                 </table><table border=strong>
                <tr><th>#</th><th>university/board</th><th>year</th><th>percentage</th><th>stream</th></tr>

 <h3>Education Dtails</h3>             
                 <tr><td>10th marksheet</td><td>". $row["s_university"] . "</td><td>". $row["s_year"] . "</td><td>". $row["s_percentage"] . "</td><td>". $row["s_stream"] . "</td></tr>
              <tr><td>12th marksheet</td><td>". $row["hs_university"] . "</td><td>". $row["hs_year"] . "</td><td>". $row["hs_percentage"] . "</td><td>". $row["hs_stream"] . "</td></tr>
             <tr><td>ug marksheet</td><td>". $row["ug_university"] . "</td><td>". $row["ug_year"] . "</td><td>". $row["ug_percentage"] . "</td><td>". $row["ug_stream"] . "</td></tr>
             <tr><td>pg marksheet</td><td>". $row["pg_university"] . "</td><td>". $row["pg_year"] . "</td><td>". $row["pg_percentage"] . "</td><td>". $row["pg_stream"] . "</td></tr>
            </table> </table><table border=strong>
             <tr><td>declaration:<p>I hereby declare that all the information provided in this admission form is true to the best of my knowledge. I understand that providing false information or withholding relevant facts may result in the rejection of my application or expulsion from the institution. I authorize the institution to process my personal data as per their privacy policy.</p>
    <p>I agree to abide by the rules and regulations of the institution, should I be admitted.</p></td></tr>
             <tr><td>signature : " . $row["signature"] . "</td></tr></table>
             
                        
                       
                       
                       
                        
                        
                      
 <div class='button-container'>
    <button onclick='window.print()'>Print Form</button>
<button><a href='updateform.php?message=" . urlencode($row['id']) . "'>Update</a></button>
                </div>";
   
}
}else{
    echo"no recorsd";
}
}
mysqli_close($conn);
?>
</div>

