<?php

require_once 'db_connect.php';
$email = $_POST['email'];
$name = $_POST['name'];
$phone = $_POST['phone_number'];
$user_id = (int)$_POST['user_id'];
$profile_pict = $_POST['profile_pict'];
//$oldemail = $_POST['myemail'];

$sql = "SELECT * FROM user WHERE user_id = '$user_id'";
//$sql = "SELECT * FROM user WHERE email = '$oldemail'";

$check = mysqli_query($conn, $sql);
if(mysqli_num_rows($check) > 0){
    $result = "UPDATE user SET email = '$email', name = '$name', phone_number = '$phone', profile_pict = '$profile_pict' WHERE user_id = '$user_id'";
    //$result = "UPDATE user SET email = '$email', name = '$name', phone_number = '$phone' WHERE email = '$oldemail'";
    if(mysqli_query($conn, $result)){
        echo "data Updated Success";
    }else{
        echo "Error Unknown";
    }
}else{
    echo "UnAuthorized User";
}

?>