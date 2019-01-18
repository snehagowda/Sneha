<?php
include "config.php";

$departid = $_POST['depart'];   // department id

$sql = "SELECT id,code,credits FROM course2 WHERE title=".$departid;

$result = mysqli_query($con,$sql);

$users_arr = array();

while( $row = mysqli_fetch_array($result) ){
    $id = $row['id'];
    $code = $row['code'];
    $credits = $row['credits'];

    $users_arr[] = array("id" => $id, "code" => $code, "credits" => $credits);
}

// encoding array to json format
echo json_encode($users_arr);