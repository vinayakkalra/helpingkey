<?php

// $link = mysqli_connect("localhost", "sharan", "sharan@quadbtech.com","test_helpingkey");
$link = mysqli_connect("localhost", "root", "", "test_helpingkey");

if (mysqli_connect_error()){
    die("<script>console.log('There is a problem with mysql connection')</script>");
}


?>
   