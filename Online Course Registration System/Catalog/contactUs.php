<?php

include "config.php";


if(isset($_POST['name']))
{

    if(!mysqli_select_db($con, $dbname))
    {
        echo 'Database not selected';
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contact (name,email,phone,country,message) VALUES ('$name','$email','$phone','$country','$message')";
    if(!mysqli_query($con, $sql))
    {
        echo 'Not Registered';
    }
    else
    {
        echo 'Registered...';
    }

    header("refresh:2; url= ");
}

?>

<html>
<head>
<title>Contact Us</title>
<link href="style3.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">  
  <form id="contact" action="" method="post">
    <h3>Contact Us</h3>
    <h4>We would love to hear from you.</h4>
    <fieldset>
      <input placeholder="Your name" name = "name" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Your Email Address" name = "email" type="email" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Your Phone Number" name = "phone" type="tel" tabindex="3" required>
    </fieldset>
    <fieldset>
      <select id="country" name="country" tabindex="4" required>
          <option value="0">- Select Country -</option>
          <option value="india">India</option>
          <option value="australia">Australia</option>
          <option value="canada">Canada</option>
          <option value="usa">USA</option>
        </select>
    </fieldset>
    <fieldset>
      <textarea placeholder="Type your Message Here...." tabindex="5" name = "message" required></textarea>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>
 
</div>    
</body>


</html>