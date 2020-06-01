<?php

require_once 'link.php';

if(isset($_POST['email'])){

    $data = array();  
    $from_ip = $_SERVER['REMOTE_ADDR'];
    $from_browser = $_SERVER['HTTP_USER_AGENT'];
    date_default_timezone_set("Asia/Calcutta");
    $date_now = date("r");

    $email = mysqli_real_escape_string($link, $_POST['email']) ;
    $password = mysqli_real_escape_string($link, $_POST['password']) ;
    $hashed_password = hash("sha512", $password);
    $hashed_time = hash("sha512", $date_now);

    $result = mysqli_query($link, "SELECT * FROM `orders_razorpay` WHERE `email` = '$email' AND `password` = '$hashed_password' AND `status` = 'paid'");

    if (mysqli_num_rows($result) !=0 ) { 
        $data['status'] = 201;
        $result = mysqli_query($link, "UPDATE `orders_razorpay` SET `token` = '$hashed_time' WHERE `email` = '$email' AND `password` = '$hashed_password' AND `status` = 'paid'");
        session_start();
        $_SESSION['useremail'] = $_POST['email'];
        $_SESSION['token'] = $hashed_time;
        echo json_encode($data);
    } else { 
        $data['status'] = 301;
        $data['error'] = 'Invalid Email or Password';
        echo json_encode($data);
    }


}


?>
