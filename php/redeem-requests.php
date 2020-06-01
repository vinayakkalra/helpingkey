<?php

require_once 'link.php';

if(isset($_POST['type'])){

    $data = array();  
    $from_ip = $_SERVER['REMOTE_ADDR'];
    $from_browser = $_SERVER['HTTP_USER_AGENT'];
    date_default_timezone_set("Asia/Calcutta");
    $date_now = date("r");
    $email = mysqli_real_escape_string($link, $_POST['email']) ;
    $redeem_amount = mysqli_real_escape_string($link, $_POST['redeem_amount']) ;

    $result = mysqli_query($link, "SELECT * FROM `redeem_requests` WHERE `email` = '$email' AND `status` = 'processing'");

    if (mysqli_num_rows($result) !=0 ) { 
        $data['status'] = 202;
        echo json_encode($data);
    } else{
        if($_POST['type'] == 'gpay'){
            $gpay_number = mysqli_real_escape_string($link, $_POST['gpay_number']) ;
            
            $query = "INSERT INTO `redeem_requests` (`gpay_number`, `email`, `time`, `from_ip`, `from_browser` , `status`, `redeem_amount`) VALUES ('$gpay_number', '$email', '$date_now', '$from_ip', '$from_browser', 'processing', '$redeem_amount')";
    
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
        if($_POST['type'] == 'phonepay'){
            $phonepay_number = mysqli_real_escape_string($link, $_POST['phonepay_number']) ;
            
            $query = "INSERT INTO `redeem_requests` (`phonepay_number`, `email`, `time`, `from_ip`, `from_browser` ,`status` , `redeem_amount`) VALUES ('$phonepay_number', '$email', '$date_now', '$from_ip', '$from_browser', 'processing' ,'$redeem_amount')";
    
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
        if($_POST['type'] == 'paytm'){
            $paytm_number = mysqli_real_escape_string($link, $_POST['paytm_number']) ;
            
            $query = "INSERT INTO `redeem_requests` (`paytm_number`, `email`, `time`, `from_ip`, `from_browser`, `status`, `redeem_amount`) VALUES ('$paytm_number', '$email', '$date_now', '$from_ip', '$from_browser', 'processing' ,'$redeem_amount')";
    
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
        if($_POST['type'] == 'account'){
            $account_number = mysqli_real_escape_string($link, $_POST['account_number']) ;
            $account_name = mysqli_real_escape_string($link, $_POST['account_name']) ;
            $account_ifsc = mysqli_real_escape_string($link, $_POST['account_ifsc']) ;
            
            $query = "INSERT INTO `redeem_requests` (`account_number`, `account_name`, `account_ifsc`, `email`, `time`, `from_ip`, `from_browser`, `status`, `redeem_amount`) VALUES ('$account_number','$account_name', '$account_ifsc', '$email', '$date_now', '$from_ip', '$from_browser', 'processing', '$redeem_amount' )";
    
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
    





    

}


?>
