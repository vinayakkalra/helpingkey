<?php
// link to mysql database here
$link = mysqli_connect("localhost", "root", "", "test_helpingkey");

if (mysqli_connect_error()){
    die("<script>console.log('There is a problem with mysql connection')</script>");
}


?>
   