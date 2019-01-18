<html>
<head>
    <title> Display Data from DB</title>
    <style type="text/css">
        table{
            border: 2px solid red;
            background-color: #FFC;
        }
        th{
            border-bottom: 5px solid #000;
        }
        td{
            border-bottom: 2px solid #666;
        }
    </style>
</head>
<body bgcolor="#E6E6FA">
    <br \>
    <h1 align="center">Displaying Student Records</h1>
    <a style="float:right";  href="http://localhost/Student/Login/studentlog.php" id="stud" class=" btn btn-one"><b>Logout</b></a>
    <a style="float:right";  href="http://localhost/Catalog/result.php" id="stud" class=" btn btn-one"><b>Request Results</b></a>
    <br \>
    <br \>
    
<?php

    include "config.php";
    $sqlget = "SELECT * FROM registab";
    $sqldata = mysqli_query($con, $sqlget) or die('Error Getting Data!!!');
    
    echo "<table>";
    echo "<tr><th>Name</th><th>USN</th><th>From Year</th><th>To Year</th><th>Semester Type</th><th>Department</th><th>Semester</th><th>Section</th><th>Course1</th><th>Course2</th><th>Course3</th><th>Course4</th><th>Course5</th></th><th>Total Courses</th><th>Total Credits</th><th>Proctor Approval</th><th>HOD Approval</th></tr>";
    
    while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
        
        echo "<tr><td>";
        echo $row['name'];
        echo "</td><td>";
        echo $row['usn'];
        echo "</td><td>";
        echo $row['year1'];
        echo "</td><td>";
        echo $row['year2'];
        echo "</td><td>";
        echo $row['semtype'];
        echo "</td><td>";
        echo $row['dept'];
        echo "</td><td>";
        echo $row['sem'];
        echo "</td><td>";
        echo $row['sec'];
        echo "</td><td>";
        echo $row['course1'];
        echo "</td><td>";
        echo $row['course2'];
        echo "</td><td>";
        echo $row['course3'];
        echo "</td><td>";
        echo $row['course4'];
        echo "</td><td>";
        echo $row['course5'];
        echo "</td><td>";
        echo $row['tot_course'];
        echo "</td><td>";
        echo $row['tot_credit'];
        echo "</td><td>";
        echo $row['proc_approval'];
        echo "</td><td>";
        echo $row['hod_approval'];
        echo "</td></tr>";
    }
echo "</table>";
?>

<form method = "post" action="Display.php">
<br \>
<br \>
  
  Release Records for resubmission: <input type="text" placeholder="Enter USN" name="usn" id="usn"><br>
  <br \>
  <input type="submit" value="Release">
    
<?php
include "config.php";

if (isset($_POST['usn']))
{ 
    $usn = $_POST['usn'];

if($con === false){ 
    die("ERROR: Could not connect. " . mysqli_connect_error()); 
} 
  
$sql = "DELETE FROM register1 WHERE usn = '".$usn."'";
$result = mysqli_query($con, $sql);    
if(!$result)
{ 
    echo "ERROR: Could not able to execute $sql. "  
                                   . mysqli_error($con);
    
}  
else{ 
     echo "Record was deleted successfully."; 
    header("Refresh:10");
} 
mysqli_close($con); 
}
?>  

    <br \>
    <br \>
    Search: <input type="text" name="usn" placeholder="Enter USN" id="usn"><br>
    <br \>
    <input type="submit" value="Search">
    <br />
    <br />
    <br \>
    <?php

    include "config.php";
    if (isset($_POST['usn']))
{ 
    $usn = $_POST['usn'];

    if($con === false)
    { 
    die("ERROR: Could not connect. " . mysqli_connect_error()); 
    } 
  
    $sql = "SELECT * FROM registab WHERE usn = '".$usn."'";
    $result = mysqli_query($con, $sql) or die('Error Getting Data!!!');  
        
    if(!$result)
{ 
    echo "ERROR: Could not able to execute $sql. "  
                                   . mysqli_error($con);
    
}  
  
    echo "<table>";
    echo "<tr><th>Name</th><th>USN</th><th>From Year</th><th>To Year</th><th>Semester Type</th><th>Department</th><th>Semester</th><th>Section</th><th>Course1</th><th>Course2</th><th>Course3</th><th>Course4</th><th>Course5</th><th>Total Courses</th><th>Total Credits</th><th>Proctor Approval</th><th>HOD Approval</th></tr>";
    
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        
        echo "<tr><td>";
        echo $row['name'];
        echo "</td><td>";
        echo $row['usn'];
        echo "</td><td>";
        echo $row['year1'];
        echo "</td><td>";
        echo $row['year2'];
        echo "</td><td>";
        echo $row['semtype'];
        echo "</td><td>";
        echo $row['dept'];
        echo "</td><td>";
        echo $row['sem'];
        echo "</td><td>";
        echo $row['sec'];
        echo "</td><td>";
        echo $row['course1'];
        echo "</td><td>";
        echo $row['course2'];
        echo "</td><td>";
        echo $row['course3'];
        echo "</td><td>";
        echo $row['course4'];
        echo "</td><td>";
        echo $row['course5'];
        echo "</td><td>";
        echo $row['tot_course'];
        echo "</td><td>";
        echo $row['tot_credit'];
        echo "</td><td>";
        echo $row['proc_approval'];
        echo "</td><td>";
        echo $row['hod_approval'];
        echo "</td></tr>";
    }
    echo "</table>";
mysqli_close($con); 
}        
?>     

</form>
    
    
</body>
</html>