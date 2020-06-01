<?php

require_once 'link.php';

if(isset($_POST['referral_id'])){

    $data = array();  
    $from_ip = $_SERVER['REMOTE_ADDR'];
    $from_browser = $_SERVER['HTTP_USER_AGENT'];
    date_default_timezone_set("Asia/Calcutta");
    $date_now = date("r");

    $referral_id = mysqli_real_escape_string($link, $_POST['referral_id']) ;
    $returning_customer = mysqli_real_escape_string($link, $_POST['returning_customer']) ;
    
    if($returning_customer == "false"){
        $result = mysqli_query($link, "UPDATE `webinar_signup_affiliate` SET `total_clicks` = `total_clicks` + 1, `unique_visitors` = `unique_visitors` + 1 WHERE `referral_id` = '$referral_id'");
        if($result)
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
    } else{
        $result = mysqli_query($link, "UPDATE `webinar_signup_affiliate` SET `total_clicks` = `total_clicks` + 1 WHERE `referral_id` = '$referral_id'");
        if($result)
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
