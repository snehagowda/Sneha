<html>
    <head><title>Showing Proctor Students Data</title> 
    <style type="text/css">
        table{
            border: 2px solid red;
            background-color: #FFC;
        }
        th{
            border-bottom: 5px solid #000;
        }
        
    </style>   
    </head>
<body bgcolor="#E6E6FA">
    
    <h1 align="center">Students Records</h1>
    <a style="float:right";  href="http://localhost/HOD/HodLog.php" id="stud" class=" btn btn-one"><b>Logout</b></a>
    <form method="post" action="hod.php">
    <br \>
    <br \>
    
    <h2>Search Records by Semester</h2>
    <select name="sem">
    <option value="-1">- Select Semester -</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    </select> <input type="submit" value="Search">
    <br \>
    <br />
        
    <?php

    include "config.php";
    if (isset($_POST['sem']))
{ 
    $sem = $_POST['sem'];

    if($con === false)
    { 
    die("ERROR: Could not connect. " . mysqli_connect_error()); 
    } 
  
    $sql = "SELECT * FROM registab WHERE sem = '".$sem."'";
    $result = mysqli_query($con, $sql) or die('Error Getting Data!!!');    
    if(!$result)
{ 
    echo "ERROR: Could not able to execute $sql. "  
                                   . mysqli_error($con);
    
}  
  
    echo "<table>";
    echo "<tr><th>Name</th><th>USN</th><th>From Year</th><th>To Year</th><th>Semester Type</th><th>Department</th><th>Semester</th><th>Section</th><th>Course1</th><th>Course2</th><th>Course3</th><th>Course4</th><th>Course5</th><th>Total Courses</th><th>Total Credits</th><th>Proctor Approval</th><th>HOD's Approval</th></tr>";
    
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
    
<form id = "main" method="post" action="hod.php">
    <h3>Grant Approval</h3>
    <br \>
    <input type="text" name="usn" placeholder="Enter USN"> <select name="choice">
    <option value="-1">- Select -</option>
    <option value="Approved">Approved</option>
    <option value="Not Approved">Not Approved</option>
    </select>
    <br \>
    <br \>
    <input type="submit" value="Submit">
    
    <?php
        include "config.php";
        if (isset($_POST['usn']))
{     
        $usn = $_POST['usn'];
        $choice = $_POST['choice'];
            
        $sql1 = "UPDATE registab SET hod_approval='".$choice."'WHERE usn='".$usn."'";

        if (mysqli_query($con, $sql1)) 
    {
            echo "Record updated successfully";
    } 
        else {
            echo "Error updating record: " . mysqli_error($con);
        }

        mysqli_close($con);
        
}
    ?>
    
    <br \>
</form>
    </body>
</html>