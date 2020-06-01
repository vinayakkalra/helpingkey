<?php
include 'link.php';
if(isset($_POST['type']) && $_POST['type'] =="coupon"){
	$coupon_code=$_POST['coupon_code'];
	$query=mysqli_query($link,"select * from coupon_code where coupon_code='$coupon_code'");
	$row=mysqli_fetch_array($query);
	if (mysqli_num_rows($query)>0){
		echo json_encode(array(
			"statusCode"=>200,
			"value"=>$row['coupon_value'],
			"coupon_code"=> $row['coupon_code'],
			"discount" =>$row['discount']
		));
	}
	else{
		echo json_encode(array("statusCode"=>201,
				"value" => 1997,
				"discount" => 0
			));
	}
	
}else if(isset($_POST['type']) && $_POST['type'] =="default"){
	$query=mysqli_query($link,"select * from coupon_code where status='default'");
	$row=mysqli_fetch_array($query);
		if (mysqli_num_rows($query)>0){
			echo json_encode(array(
				"statusCode"=>200,
				"value"=>$row['coupon_value'],
				"coupon_code"=> $row['coupon_code'],
				"discount" =>$row['discount']
			));
		}
		else{
			echo json_encode(array("statusCode"=>201,
			"value"=> 1997,
			"discount" => 0
		));		
	}
}


?>