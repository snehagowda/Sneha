<html>
    <head><title>Showing Request Data</title> 
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
    
    <h1 align="center">Student Requests</h1>
    <a style="float:right";  href="" id="stud" class=" btn btn-one"><b>Logout</b></a>
    <form method="post" action="result.php">
    <br \>
    <br \>
        
<?php        

    include "config.php";
    $sql = "SELECT * FROM reqfrm";
    $result = mysqli_query($con, $sql) or die('Error Getting Data!!!');    
    if(!$result)
{ 
    echo "ERROR: Could not able to execute $sql. "  
                                   . mysqli_error($con);
    
}  
  
    echo "<table>";
    echo "<tr><th>Name</th><th>USN</th><th>Semester</th><th>Subject</th><th>Message</th></tr>";
    
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        
        echo "<tr><td>";
        echo $row['name'];
        echo "</td><td>";
        echo $row['usn'];
        echo "</td><td>";
        echo $row['sem'];
        echo "</td><td>";
        echo $row['sub'];
        echo "</td><td>";
        echo $row['msg'];
        echo "</td></tr>";
    }
    echo "</table>";
mysqli_close($con); 
        
?>   
</form>
    
<form id = "main" method="post" action="result.php">
    
    
</form>
    </body>
</html>