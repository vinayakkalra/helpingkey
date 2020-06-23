<?php

require_once 'link.php';

if(isset($_POST['type'])){
    if($_POST['type'] == 'get-order'){
        $data = array();  
        $email = $_POST['email'];

        $query = "SELECT * FROM `orders_razorpay` WHERE `email` = '$email'";

        if($result = mysqli_query($link, $query))  
        {
            $order = array();
            $i = 0; 
            while ($row = mysqli_fetch_assoc($result)) {
                $order[$i] = $row; 
                $i = $i+1;
            } 
            $data['status'] = 'ok';
            $data['order'] = $order;
            echo json_encode($data);
        }  
        else  
        {  
        echo "<script>console.log('error','problem with query')</script>"; 
        } 
    } 
}

?>
   