<?php

require_once 'link.php';

if(isset($_POST['email'])){
    $data = array();  
    $from_ip = $_SERVER['REMOTE_ADDR'];
    $from_browser = $_SERVER['HTTP_USER_AGENT'];
    date_default_timezone_set("Asia/Calcutta");
    $date_now = date("r");
    $email = mysqli_real_escape_string($link, $_POST['email']) ;
    $paidRequests = array();

    $result = mysqli_query($link, "SELECT * FROM `rewards_request` WHERE `email` = '$email' AND `status` = 'paid'");
    if (mysqli_num_rows($result) !=0 ) { 
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $paidRequests[$i]['email'] = $row['email'];  
            $paidRequests[$i]['badge'] = $row['badge'];
            $i = $i + 1;
        }

    $data['status'] = 101;
    $data['paidRequests'] = $paidRequests;
    echo json_encode($data);
    }else{
        $data['status'] = 401;
        $data['error'] = 'No order found for this referral id';
        echo json_encode($data);
    }
}
?>