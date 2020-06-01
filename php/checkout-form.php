<?php

require_once 'link.php';

if(isset($_POST['productName']) == 'productName'){

    $data = array();  
    $from_ip = $_SERVER['REMOTE_ADDR'];
    $from_browser = $_SERVER['HTTP_USER_AGENT'];
    date_default_timezone_set("Asia/Calcutta");
    $date_now = date("r");

    $name = mysqli_real_escape_string($link, $_POST['name']) ;
    $phone = mysqli_real_escape_string($link,$_POST['phone']);
    $email = mysqli_real_escape_string($link,$_POST['email']);
    $country =mysqli_real_escape_string($link, $_POST['country']);
    $address = mysqli_real_escape_string($link,$_POST['address']);
    $state = mysqli_real_escape_string($link,$_POST['state']);
    $postcode = mysqli_real_escape_string($link,$_POST['postcode']);
    $other_details =mysqli_real_escape_string($link, $_POST['other_details']);
    $productName = mysqli_real_escape_string($link,$_POST['productName']);
    $amount = mysqli_real_escape_string($link,$_POST['amount']);
    $referral_id = "";
    if(isset($_POST["referral_id"])){
        $referral_id = mysqli_real_escape_string($link, $_POST["referral_id"]);
    }
    if(isset($_POST["coupon_code"])){
        $coupon_code = mysqli_real_escape_string($link, $_POST["coupon_code"]);
    }
    $password = mysqli_real_escape_string($link, $_POST['password']);
    $hashed_password = hash("sha512", $password);

    if($phone == ""){
        $phone = 0;
    }
    if($amount == ""){
        $amount = 0;
    }
    if($postcode == ""){
        $postcode = 0;
    }

    $id = 0;

    $result = mysqli_query($link, "SELECT max(id) FROM `orders_razorpay`");

    while ($row = mysqli_fetch_array($result)) {
        $id = $row[0];  
    }
    $id = $id + 1;

    $query =mysqli_query($link, "SELECT * FROM `orders_razorpay` WHERE email ='$email' AND status ='paid'");
        if (mysqli_num_rows($query)>0){
		    echo json_encode(array(
                "status"=>701
            ));
        }else{        
            $query = "INSERT INTO `orders_razorpay` (`id`, `name`, `phone`, `email`, `country`, `address`, `state`, `postcode`, `other_details`, `productName`, `amount`, `coupon_code`, `date_now`, `from_ip`, `from_browser`, `status`, `referral_id` ,`password`) VALUES ('$id','$name', '$phone', '$email', '$country', '$address', '$state', '$postcode' , '$other_details', '$productName', '$amount','$coupon_code','$date_now','$from_ip', '$from_browser','processing', '$referral_id' ,'$hashed_password')";

            // echo $query;
            
            if($result = mysqli_query($link, $query))  
            {  
                $data['status'] = 201;
                $data['id'] = $id;
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
