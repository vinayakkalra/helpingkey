<?php

require_once 'link.php';

if(isset($_POST['email'])){

    $data = array();  
    $from_ip = $_SERVER['REMOTE_ADDR'];
    $from_browser = $_SERVER['HTTP_USER_AGENT'];
    date_default_timezone_set("Asia/Calcutta");
    $date_now = date("r");

    $phone = mysqli_real_escape_string($link, $_POST['phone']) ;
    $email = mysqli_real_escape_string($link, $_POST['email']) ;
    $password = mysqli_real_escape_string($link, $_POST['password']) ;
    $hashed_password = hash("sha512", $password);

    $result = mysqli_query($link, "SELECT * FROM `orders_razorpay` WHERE `email` = '$email' AND `phone` = '$phone' AND `status` = 'paid'");
    if (mysqli_num_rows($result) ==0 ) { 
        $data['status'] = 301;
        $data['error'] = 'Invalid Registered Email and Phone number.';
        echo json_encode($data);
    } else{
        $query = "UPDATE `orders_razorpay` SET `password` = '$hashed_password' WHERE `email` = '$email' AND `phone` = '$phone' AND `status` = 'paid'";

        // echo $query;
        
        if($result = mysqli_query($link, $query))
        {  
            $data['status'] = 201;
            echo json_encode($data);
        }  
        else  
        {  
            $data['status'] = 601;
            $data['error'] = $link -> error;
            echo json_encode($data);
        }
    }




    

}


?>
