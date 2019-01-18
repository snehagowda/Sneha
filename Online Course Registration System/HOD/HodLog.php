<?php

$host="localhost";
$user="root";
$password="";
$db="bmsce";

$con = mysqli_connect($host,$user,$password, $db);
mysqli_select_db($con, $db);

if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    session_start();

    $_SESSION['usrnm'] = $uname;
    
    $sql= "select * from hodlog where username='".$uname."'AND password='".$password."' limit 1";
    $result=mysqli_query($con, $sql);
    
    if(mysqli_num_rows($result)==1){
        //echo "You have successfully logged in.";
        //exit();
      
    function redirect($url)
    {
        header('Location: '.$url);
        exit();
    }
    redirect('http://localhost/HOD/hod.php');    
    
    }
    else
    {
        echo "You have entered incorrect password";
    }
        
}
?>

<html>
<head>
<title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="style3.css">
<body>
    
    <header>
        <div class="row">
            <div class="logo">
            <img src="bms.png">
            </div>
           <ul class="main-nav">
            <li ><a href="http://localhost/HomePage/HomePage.php">HOME</a></li>
            <li><a href="http://localhost/Catalog/contactUs.php">ABOUT US</a></li>
            <li><a href="http://localhost/Catalog/aboutUs.php">CONTACT US</a></li>
           
        </ul>
        </div>
    </header>
    
    <div class="loginbox">
        <img src="log.png" class="avatar">
        <h1>HOD's Login </h1>
        <form method="POST" action="#">
            <p>Username</p>
            <input type="text" name = "username" placeholder="Enter Username" required>
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" required>
            <input type="submit" name="" value="Login">
            <a href="#">Forgot Password?</a><br>
            <a href="#">Don't have an account?</a>
        </form>
        <form method="get" action="proc.php">
        
        </form>
        
    </div>
</body>
</head>
</html>
