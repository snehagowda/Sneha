<?php

include "config.php";


if(isset($_POST['name']))
{

    if(!mysqli_select_db($con, $dbname))
    {
        echo 'Database not selected';
    }

    $name = $_POST['name'];
    $usn = $_POST['usn'];
    $sem = $_POST['sem'];
    $sub = $_POST['sub'];
    $msg = $_POST['msg'];

    $sql = "INSERT INTO reqfrm (name,usn,sem,sub,msg) VALUES ('$name','$usn','$sem','$sub','$msg')";
    if(!mysqli_query($con, $sql))
    {
        echo 'Not Registered';
    }
    else
    {
        echo 'Registered...';
    }

    header("refresh:2; url= request.php");
}

?>

<html>
<head>
<title>Request Page</title>  
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">  
  <form id="contact" action="request.php" method="POST">
    <h3>Request</h3>
    <h4>How can I help you? </h4>
    <fieldset>
      <input placeholder="Your name" name = "name" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Your USN" name = "usn" type="text" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Your Semester" name = "sem" type="text" tabindex="3" required>
    </fieldset>
    <fieldset>
      <input placeholder="Subject Concerning" name = "sub" type="text" tabindex="4" required>
    </fieldset>
    <fieldset>
      <textarea placeholder="Type your Message Here...." name = "msg" tabindex="5" required></textarea>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" value = "insert" id="contact-submit">Submit</button>
    </fieldset>
  </form>
</div>    
</body>
</html>