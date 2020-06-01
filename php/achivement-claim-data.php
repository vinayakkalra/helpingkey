<?php

require_once 'link.php';

if(isset($_POST['badge'])){
    $data = array();  
    $from_ip = $_SERVER['REMOTE_ADDR'];
    $from_browser = $_SERVER['HTTP_USER_AGENT'];
    date_default_timezone_set("Asia/Calcutta");
    $date_now = date("r");
    $email = mysqli_real_escape_string($link, $_POST['email']) ;
    $badge =mysqli_real_escape_string($link, $_POST['badge']);

    $check = mysqli_query($link, "SELECT * FROM `rewards_request` WHERE `email` = '$email' AND `badge` = '$badge' AND `status` = 'paid'");
    if (mysqli_num_rows($check) !=0 ) { 
        $data['status'] = 101;
        echo json_encode($data);

    }else{          
        $result = mysqli_query($link, "SELECT * FROM `rewards_request` WHERE `email` = '$email' AND `badge` = '$badge' AND `status` = 'processing'");

        if (mysqli_num_rows($result) !=0 ) { 
            $data['status'] = 202;
            echo json_encode($data);
        } else{
            if($_POST['badge'] == $badge){
                $badge = mysqli_real_escape_string($link, $_POST['badge']) ;
                
                $query = "INSERT INTO `rewards_request` (`email`, `time`, `from_ip`, `from_browser`,`badge` , `status`) VALUES ('$email', '$date_now', '$from_ip', '$from_browser', '$badge','processing')";
        
                // echo $query;
                
                if($result = mysqli_query($link, $query)){  
                    $data['status'] = 201;
                    echo json_encode($data);
                }else{  
                    $data['status'] = 601;
                    $data['error'] = $link -> error;
                    echo json_encode($data);
                }
            }
        }
    }
         
}


?>