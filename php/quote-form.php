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

    $id = 0;

    $result = mysqli_query($link, "SELECT max(id) FROM `company_quote`");

    while ($row = mysqli_fetch_array($result)) {
        $id = $row[0];  
    }
    $id = $id + 1;

    $query = "INSERT INTO `company_quote` (`id`, `country`, `fname`, `lname`, `company`, `address`, `appartment`, `towncity`, `state`, `zipCode`, `phone`, `email`, `date_now`, `from_ip`, `from_browser`) VALUES ('$id', '$country', '$fname', '$lname', '$company', '$address', '$appartment', '$towncity', '$state', '$zipCode', '$phone', '$email', '$date_now', '$from_ip' ,'$from_browser')";

    if($result = mysqli_query($link, $query)) {  
        $data['status'] = 201;
        $data['id'] = $id;
        echo json_encode($data);
    }else {  
        $data['status'] = 601;
        $data['error'] = $link -> error;
        echo json_encode($data);
    } 
}
?>