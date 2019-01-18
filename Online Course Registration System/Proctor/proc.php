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
    <br \>
    <h1 align="center">Proctor Students</h1>
    <a style="float:right";  href="http://localhost/Proctor/proc_log.php" id="stud" class=" btn btn-one"><b>Logout</b></a>
    <br \>
    <br \>
    <form method="post" action="proc.php">
        
            
            
        </form>
    
<!-- Displaing all students under a specific proctor -->     
<?php
        session_start();
        $user_name = '';
        if (!empty($_SESSION['usrnm'])) {
            $user_name = $_SESSION['usrnm'];
        }

        echo "Welcome User: ".$user_name.".";
?>
        
<?php

    include "config.php";
    $sqlget = "SELECT * FROM registab WHERE proc_usrnm = '".$user_name."'";
    $sqldata = mysqli_query($con, $sqlget) or die('Error Getting Data!!!');
    
    echo '<br \>';
    echo '<br \>';
    echo "<table>";
    echo "<tr><th>Name</th><th>USN</th><th>From Year</th><th>To Year</th><th>Semester Type</th><th>Department</th><th>Semester</th><th>Section</th><th>Course1</th><th>Course2</th><th>Course3</th><th>Course4</th><th>Course5</th><th>Total Courses</th><th>Total Credits</th><th>Proctor Approval</th><th>HOD's Approval</th></tr>";
    
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
        
<!-- Proctor Approval -->        
    <br />
    <br \>
    <form method="post" action="proc.php">
        
        <table align="center">
            
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
        
        if (isset($_POST['usn']))
{     
        $usn = $_POST['usn'];
        $choice = $_POST['choice'];
        $sql = "UPDATE registab SET proc_approval='".$choice."'WHERE usn='".$usn."'";

        if (mysqli_query($con, $sql)) {
            echo "Record updated successfully";
        header("Refresh:2; url=proc.php");
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }

        mysqli_close($con);
        
}
        
    ?>
            
        </table>
        
    </form>    
        
    </body>
</html>