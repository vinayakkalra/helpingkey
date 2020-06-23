<?php

require_once 'link.php';

if(isset($_POST['country']) == 'country'){

    $data = array();  
    $from_ip = $_SERVER['REMOTE_ADDR'];
    $from_browser = $_SERVER['HTTP_USER_AGENT'];
    date_default_timezone_set("Asia/Calcutta");
    $date_now = date("r");

    $country =mysqli_real_escape_string($link, $_POST['country']);
    $fname = mysqli_real_escape_string($link, $_POST['fname']) ;
    $lname = mysqli_real_escape_string($link, $_POST['lname']) ;
    $company = mysqli_real_escape_string($link,$_POST['company']);    
    $address = mysqli_real_escape_string($link,$_POST['address']);
    $appartment = mysqli_real_escape_string($link,$_POST['appartment']);
    $towncity = mysqli_real_escape_string($link,$_POST['towncity']);
    $state = mysqli_real_escape_string($link,$_POST['state']);
    $zipCode = mysqli_real_escape_string($link,$_POST['zipCode']);
    $phone = mysqli_real_escape_string($link,$_POST['phone']);
    $email = mysqli_real_escape_string($link,$_POST['email']);
    $country1 =mysqli_real_escape_string($link, $_POST['country1']);
    $fname1 = mysqli_real_escape_string($link, $_POST['fname1']) ;
    $lname1 = mysqli_real_escape_string($link, $_POST['lname1']) ;
    $company1 = mysqli_real_escape_string($link,$_POST['company1']);    
    $address1 = mysqli_real_escape_string($link,$_POST['address1']);
    $appartment1 = mysqli_real_escape_string($link,$_POST['appartment1']);
    $towncity1 = mysqli_real_escape_string($link,$_POST['towncity1']);
    $state1 = mysqli_real_escape_string($link,$_POST['state1']);
    $zipCode1 = mysqli_real_escape_string($link,$_POST['zipCode1']);
    $special_note =mysqli_real_escape_string($link, $_POST['special_note']);
    $productName = mysqli_real_escape_string($link,$_POST['productName']);
    $quantity = mysqli_real_escape_string($link,$_POST['quantity']);
    $amount = mysqli_real_escape_string($link,$_POST['amount']);
    $discount = mysqli_real_escape_string($link,$_POST['discount']);
    $giftWrap = mysqli_real_escape_string($link,$_POST['giftWrap']);
    $password = mysqli_real_escape_string($link,$_POST['password']);
    $hashed_password = hash("sha512", $password);
    
    $referral_id = "";
    if(isset($_POST["referral_id"])){
        $referral_id = mysqli_real_escape_string($link, $_POST["referral_id"]);
    }
    if(isset($_POST["coupon_code"])){
        $coupon_code = mysqli_real_escape_string($link, $_POST["coupon_code"]);
    }

    if($phone == ""){
        $phone = 0;
    }
    if($amount == ""){
        $amount = 0;
    }
    if($zipCode == ""){
        $zipCode = 0;
    }
    if($zipCode1 == ""){
        $zipCode1 = 0;
    }

    $id = 0;

    $result = mysqli_query($link, "SELECT max(id) FROM `orders_razorpay`");

    while ($row = mysqli_fetch_array($result)) {
        $id = $row[0];  
    }
    $id = $id + 1;

    // $query =mysqli_query($link, "SELECT * FROM `orders_razorpay` WHERE email ='$email' AND status ='paid'");
        // if (mysqli_num_rows($query)>0){
		    // echo json_encode(array(
                // "status"=>701
            // ));
        // }else{      
            $query = "INSERT INTO `orders_razorpay` (`id`, `country`, `fname`, `lname`, `company`, `address`, `appartment`, `towncity`, `state`, `zipCode`, `phone`, `email`, `country1`, `fname1`, `lname1`, `company1`, `address1`, `appartment1`, `towncity1`, `state1`, `zipCode1`, `special_note`,`giftWrap`, `productName`, `quantity`, `amount`, `referral_id`, `coupon_code`, `discount`,`date_now`, `from_ip`, `from_browser`, `status`) VALUES ('$id', '$country', '$fname', '$lname', '$company', '$address', '$appartment', '$towncity', '$state', '$zipCode', '$phone', '$email', '$country1', '$fname1', '$lname1', '$company1', '$address1', '$appartment1', '$towncity1', '$state1', '$zipCode1', '$special_note','$giftWrap', '$productName', '$quantity','$amount', '$referral_id', '$coupon_code','$discount', '$date_now' , '$from_ip', '$from_browser', 'processing')";  
            
            if($password != ""){
                $query1 = "INSERT INTO `users` (`email`, `password`) VALUES ('$email', '$hashed_password')";
            }
            if($result = mysqli_query($link, $query) and $result1 = mysqli_query($link, $query1) ) {  
                $data['status'] = 201;
                $data['id'] = $id;
                echo json_encode($data);
            
            }else {  
                $data['status'] = 601;
                $data['error'] = $link -> error;
                echo json_encode($data);
            } 
        // }
    }
?>
