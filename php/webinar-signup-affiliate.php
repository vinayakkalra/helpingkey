<?php

require_once 'link.php';

if(isset($_POST['name'])){

    $data = array();  
    $from_ip = $_SERVER['REMOTE_ADDR'];
    $from_browser = $_SERVER['HTTP_USER_AGENT'];
    date_default_timezone_set("Asia/Calcutta");
    $date_now = date("r");

    $name = mysqli_real_escape_string($link, $_POST['name']) ;
    $phone = mysqli_real_escape_string($link, $_POST['phone']) ;
    $email = mysqli_real_escape_string($link, $_POST['email']) ;
    $password = mysqli_real_escape_string($link, $_POST['password']) ;
    $hashed_password = hash("sha512", $password);
    $hashed_email =  hash("md5", $email);

    $result = mysqli_query($link, "SELECT * FROM `webinar_signup_affiliate` WHERE `email` = '$email'");
    $result1 = mysqli_query($link, "SELECT * FROM `webinar_signup_affiliate` WHERE `phone` = '$phone'");
    if (mysqli_num_rows($result) !=0 ) { 
        $data['status'] = 301;
        $data['error'] = 'This Email ID is already registered';
        echo json_encode($data);
    } else if (mysqli_num_rows($result1) !=0 ) { 
        $data['status'] = 302;
        $data['error'] = 'This Phone Number is already registered.';
        echo json_encode($data);
    } else{
        $query = "INSERT INTO `webinar_signup_affiliate` (`name`, `phone`, `email`, `password`, `time`,`referral_id`, `from_ip`, `from_browser`, `commission`) VALUES ('$name', '$phone', '$email', '$hashed_password','$date_now', '$hashed_email', '$from_ip', '$from_browser', 0.3)";

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
