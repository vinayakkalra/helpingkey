<?php

    require_once 'php/link.php';
    session_start();

    $name = "";  
    $phone = ""; 
    $country = ""; 
    $address = ""; 
    $state = ""; 
    $postcode = ""; ;
    $amount = ""; 
    $date_now = ""; 
    $product_name = ""; 
    $new_batch = true;
    $token = null;
    $day = "1";

    
    date_default_timezone_set("Asia/Calcutta");

    //video start timestamp for day 1, 2 and 3
    $eventDay1 = date("Y-m-d H:i:s", mktime(18, 00, 00, 5, 15, 2020));
    $eventDay2 = date("Y-m-d H:i:s", mktime(18, 00, 00, 5, 16, 2020));
    $eventDay3 = date("Y-m-d H:i:s", mktime(18, 00, 00, 5, 17, 2020));

    //intro to make dir
    //mktime(hour, minute, second, month, day, year)

    //current date
    $currentDate = date("Y-m-d H:i:s");


    if(isset($_SESSION['useremail'])){

        $email = $_SESSION['useremail'];

        $result = mysqli_query($link, "SELECT `name`, `phone`, `country`, `address`, `state`, `postcode`, `amount`, `date_now`, `productName`, `token` FROM `orders_razorpay` WHERE `email` = '$email' AND `status` = 'paid' ");

        if (mysqli_num_rows($result) !=0 ) { 
            while ($row = mysqli_fetch_array($result)) {
                $name = $row['name'];  
                $phone = $row['phone'];
                $country = $row['country'];
                $address = $row['address'];
                $state = $row['state'];
                $postcode = $row['postcode'];
                $amount = $row['amount'];
                $date_now = $row['date_now'];
                $product_name = $row['productName'];
                $token = $row['token'];
                
            }

            if($token == null || $token == $_SESSION['token']){
                    
                if($product_name == 'Crypto-Nite3'){
                    $new_batch = true;
                    $tillDay = 0;
                    if(strtotime($eventDay3) - strtotime($currentDate) < 0){
                        $tillDay = 3;
                    }else if(strtotime($eventDay2) - strtotime($currentDate) < 0){
                        $tillDay = 2;
                    }else if(strtotime($eventDay1) - strtotime($currentDate) < 0){
                        $tillDay = 1;
                    }else{
                        $tillDay = 0;
                        header("Location: user-login");
                    }

                    if(isset($_GET['day'])){
                        
                        $day = $_GET['day'];
                        if($day > $tillDay ){
                            $day = '1';
                        }
                    }else{
                        $day = "1";
                    }
                    // header("Location: user-login");
                } else if($product_name == 'Crypto-Nite 2020' || $product_name == 'Crypto-Nite2'){
                    $new_batch = false;
                    if(isset($_GET['day'])){
                        
                        $day = $_GET['day'];
                        if($day > 3 ){
                            $day = '1';
                        }
                    }else{
                        $day = "1";
                    }
                }
            } else{
                header("Location: user-login");
            }

        } else { 
            // $data['status'] = 301;
            // $data['error'] = 'There was an error accessing your dashboard. Please contact us at support@finstreet.in';
            header("Location: user-login");
        }

    } else{
        header("Location: user-login");
        // echo 'inside else';
    }

?>


<!DOCTYPE html>
<html>

<head>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-150643411-2"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-150643411-2');
    </script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-PFRW8HP');</script>
        <!-- End Google Tag Manager -->

    <title>Cryptonite | Finstreet | India's 1st ever Financial Freedom Coach</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/cropped-Fin-270x270.jpg">

    <!-- for video streaming -->
    <link href="https://vjs.zencdn.net/7.7.5/video-js.css" rel="stylesheet" />
    <link href="lib/videojs-resolution-switcher.css" rel="stylesheet">
  
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    
    <style>
        /* Style the tab */
        .tab {
            overflow: hidden;
            display: flex;
            justify-content: center;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
            color:#fff;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            color: #fff;
            border-bottom: 3px solid #231c62;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            color: #fff;
            border-bottom: 3px solid #231c62;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            color:#fff;
            /* border:2px solid #ffffff; */
        }

        
    </style>

    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '2925272084236286');
        fbq('track', 'PageView');
      </script>
      <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=2925272084236286&ev=PageView&noscript=1"
      /></noscript>
      <!-- End Facebook Pixel Code -->
</head>
<body style="background-color:#00abc9">
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PFRW8HP"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


    <div class="d-none d-lg-block">
        <!-- Navigation -->
        <div class="fixed-top" style="padding:20px 0px;background-color:#00abc9;outline:none;">
            <nav class="navbar navbar-expand-lg navbar-dark static-top">
                <div class="container">
                    <a class="navbar-brand" href="/">
                        <img src="images/logo.png" alt="" width="133" height="50">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto font-roboto-b" style="font-size: 18px;font-weight:bold;">
                            
                            <li class="nav-item active">
                                <a class="nav-link" href="user-login">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <!-- main content -->
        <div class="container-fluid px-0 d-flex justify-content-center" style="margin-top:116px;background-color:black">
            
                <!-- <iframe width="100%" height="500" src="https://www.youtube.com/embed/4qMQDZvxHHU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe> -->
                <!-- <iframe width="100%" height="800" src="https://www.youtube.com/embed/TVkAE1lhKK0?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                <video id="video_1" class="video-js vjs-default-skin vjs-big-play-centered" width="1280" height="720" controls data-setup='{}'>
                    <source src="videos/day<?php echo $day; ?>/media_720.m3u8" type='application/x-mpegURL' label='720p' res='720' />
                    <source src="videos/day<?php echo $day; ?>/media_540.m3u8" type='application/x-mpegURL' label='540p' res='540' />
                    <source src="videos/day<?php echo $day; ?>/media_360.m3u8" type='application/x-mpegURL' label='360p' res='360'/>
                    <source src="videos/day<?php echo $day; ?>/media_270.m3u8" type='application/x-mpegURL' label='270p' res='270'/>
                    <source src="videos/day<?php echo $day; ?>/media_180.m3u8" type='application/x-mpegURL' label='180p' res='180'/>
                </video>
            
        </div>
        <!-- main content 1 -->
        <div class="container-fluid">
            <div class="container" style="padding:40px 0px;">
                <div class="tab font-roboto-b">
                    <button class="tablinks" onclick="openCity(event, 'select-day')" id="defaultOpen">Select Day</button>
                    <button class="tablinks" onclick="openCity(event, 'Downloadable')">Downloadable</button>
                    <button class="tablinks" onclick="openCity(event, 'live-q&a')">Live Q&A</button>
                    <button class="tablinks" onclick="openCity(event, 'start-trading')">Start Trading</button>
                </div> 
                <hr style="border:1px solid #d2d2d2;">
                <!-- tab 1 -->
                <div id="select-day" class="tabcontent font-roboto-r">
                    <div style="display:flex;justify-content:center;">
                        <div class="col-md-6" style="display:flex;justify-content:center;border:2px solid #fff;
                        border-radius:15px;padding:0;">
                            <div class="col-md-1" style="padding:18px;text-align:center;">
                                <b>DAY:1</b>
                            </div>
                            <div class="col-md-6" style="padding:18px;text-align:left;">
                                <p style="margin-bottom:0px;">Intro to Cryptocurrency</p>
                            </div>
                            <div class="col-md-5" style="padding:18px;text-align:center;background-color:#fff;border-radius:15px;margin-left:6px;">
                                
                                <?php 
                                
                                    if($day == "1"){ 
                                        echo '<a href="#" style="color:#000;">Now Watching</a>'; 
                                    } else{
                                        if($new_batch){
                                            if(strtotime($eventDay1) - strtotime($currentDate) < 0){
                                                echo '<a href="cryptonite?day=1" style="color:#000;">Watch Now</a>';
                                            }else{
                                                echo '<a style="color:#000;">Unlocks in 24 Hours</a>';
                                                
                                            }
                                            
                                        }else{
                                            echo '<a href="cryptonite?day=1" style="color:#000;">Watch Now</a>';
                                        }
                                        
                                    }
                                
                                ?>
                                
                            </div>
                        </div>
                    </div>
                    <div style="display:flex;justify-content:center;margin-top:20px;">
                        <div class="col-md-6" style="display:flex;justify-content:center;border:2px solid #fff;
                        border-radius:15px;padding:0;">
                            <div class="col-md-1" style="padding:18px;text-align:center;">
                                <b>DAY:2</b>
                            </div>
                            <div class="col-md-6" style="padding:18px;text-align:left;">
                                <p style="margin-bottom:0px;">How to Trade in Cryptocurrency</p>
                            </div>
                            <div class="col-md-5" style="padding:18px;text-align:center;background-color:#fff;border-radius:15px;margin-left:6px;">
                                <?php 
                                    
                                    if($day == "2"){ 
                                        echo '<a href="#" style="color:#000;">Now Watching</a>'; 
                                    } else{
                                        if($new_batch){
                                            if(strtotime($eventDay2) - strtotime($currentDate) < 0){
                                                echo '<a href="cryptonite?day=2" style="color:#000;">Watch Now</a>';
                                            }else{
                                                echo '<a style="color:#000;">Unlocks in '.round((int)abs(strtotime($eventDay2) - strtotime($currentDate))/(60*60)).' Hours</a>';
                                                
                                            }
                                            
                                        }else{
                                            echo '<a href="cryptonite?day=2" style="color:#000;">Watch Now</a>';
                                        }
                                        
                                    }
                                
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="lock" style="display:flex;justify-content:center;margin-top: -64px;">
                        <div class="col-md-6" style="display:flex;justify-content:center;border:2px solid #fff;border-radius:15px;background-color: #000;opacity: 0.7;">                            
                            <div class="wideCountdown clearfix cdLabelBold cdWhite cdLabelWhite cdStyleCircleLine wideCountdownSize1 is-countdown font-poppins-bold" data-date="03/26/2020" data-time="14" data-tz="india" data-url="#" data-lang="eng" data-color-time="rgb(255, 255, 255)" data-color-label="rgba(255, 255, 255, 0.3)" style="padding: 7px 0px 2px 0px;font-size:9px;display: grid;justify-content: center;">
                                <span class="countdown-row countdown-show4">
                                    <span class="countdown-section">
                                        <span class="days countdown-amount font-poppins-regular" style="font-size:10px;">0</span>                                        
                                        <span class="countdown-period font-poppins-regular" style="font-size:10px;">Days</span>
                                    </span>
                                    <span class="countdown-section">
                                        <span class="hours countdown-amount font-poppins-regular" style="font-size: 9px;min-width: 40px;">00</span>
                                        <span class="countdown-period font-poppins-regular" style="font-size:10px;">Hours</span>
                                    </span>
                                    <span class="countdown-section">
                                        <span class="mins countdown-amount font-poppins-regular" style="font-size: 9px;min-width: 40px;">00</span>
                                        <span class="countdown-period font-poppins-regular" style="font-size:10px;">Minutes</span>
                                    </span>
                                    <span class="countdown-section">
                                        <span class="secs countdown-amount font-poppins-regular" style="font-size: 9px;min-width: 40px;">00</span>
                                        <span class="countdown-period font-poppins-regular" style="font-size: 10px;">Seconds</span>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div> -->
                    <div style="display:flex;justify-content:center;margin-top:20px;">
                        <div class="col-md-6" style="display:flex;justify-content:center;border:2px solid #fff;
                        border-radius:15px;padding:0;">                            
                            <div class="col-md-1" style="padding:18px;text-align:center;">
                                <b>DAY:3</b>
                            </div>
                            <div class="col-md-6" style="padding:18px;text-align:left;">
                                <p style="margin-bottom:0px;">Prepairing for the Next Wave</p>
                            </div>
                            <div class="col-md-5" style="padding:18px;text-align:center;background-color:#fff;border-radius:15px;margin-left:6px;">
                                <?php 
                                        
                                    if($day == "3"){ 
                                        echo '<a href="#" style="color:#000;">Now Watching</a>'; 
                                    } else{
                                        if($new_batch){
                                            if(strtotime($eventDay3) - strtotime($currentDate) < 0){
                                                echo '<a href="cryptonite?day=3" style="color:#000;">Watch Now</a>';
                                            }else{
                                                echo '<a style="color:#000;">Unlocks in '.round((int)abs(strtotime($eventDay3) - strtotime($currentDate))/(60*60)).' Hours</a>';
                                                
                                            }
                                            
                                        }else{
                                            echo '<a href="cryptonite?day=3" style="color:#000;">Watch Now</a>';
                                        }
                                        
                                    }
                                    
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="lock1" style="display:flex;justify-content:center;margin-top: -64px;">
                        <div class="col-md-6" style="display:flex;justify-content:center;border:2px solid #fff;border-radius:15px;background-color: #000;opacity: 0.7;">                            
                            <div class="wideCountdown clearfix cdLabelBold cdWhite cdLabelWhite cdStyleCircleLine wideCountdownSize1 is-countdown font-poppins-bold" data-date="03/26/2020" data-time="14" data-tz="india" data-url="#" data-lang="eng" data-color-time="rgb(255, 255, 255)" data-color-label="rgba(255, 255, 255, 0.3)" style="padding: 7px 0px 2px 0px;font-size:9px;display: grid;justify-content: center;">
                                <span class="countdown-row countdown-show4">
                                    <span class="countdown-section">
                                        <span class="days1 countdown-amount font-poppins-regular" style="font-size:10px;">00</span>                                        
                                        <span class="countdown-period font-poppins-regular" style="font-size:10px;">Days</span>
                                    </span>
                                    <span class="countdown-section">
                                        <span class="hours1 countdown-amount font-poppins-regular" style="font-size: 9px;min-width: 40px;">00</span>
                                        <span class="countdown-period font-poppins-regular" style="font-size:10px;">Hours</span>
                                    </span>
                                    <span class="countdown-section">
                                        <span class="mins1 countdown-amount font-poppins-regular" style="font-size: 9px;min-width: 40px;">00</span>
                                        <span class="countdown-period font-poppins-regular" style="font-size:10px;">Minutes</span>
                                    </span>
                                    <span class="countdown-section">
                                        <span class="secs1 countdown-amount font-poppins-regular" style="font-size: 9px;min-width: 40px;">00</span>
                                        <span class="countdown-period font-poppins-regular" style="font-size: 10px;">Seconds</span>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- tab 2 -->
                <div id="Downloadable" class="tabcontent">
                    <div style="display:flex;justify-content:center;">
                        <div class="col-md-6" style="display:flex;justify-content:center;border:2px solid #fff;
                        border-radius:15px;padding:0;">
                            
                            <div class="col-md-7" style="padding:18px;text-align:left;">
                                <p style="margin-bottom:0px; font-weight: bold;">Crypto Glossary</p>
                            </div>
                            <div class="col-md-5" style="padding:18px;text-align:center;background-color:#fff;border-radius:15px;margin-left:6px;">
                                <a href="https://cryptonite.finstreet.in/docs/Finstreet%20Crypto%20Glossary.pdf" target="_blank" style="color:#000;">DOWNLOAD</a>
                            </div>
                        </div>
                    </div>
                    <div style="display:flex;justify-content:center;margin-top:20px;">
                        <div class="col-md-6" style="display:flex;justify-content:center;border:2px solid #fff;
                        border-radius:15px;padding:0;">
                            
                            <div class="col-md-7" style="padding:18px;text-align:left;">
                                <p style="margin-bottom:0px; font-weight: bold;">DeFi E-Book</p>
                            </div>
                            <div class="col-md-5" style="padding:18px;text-align:center;background-color:#fff;border-radius:15px;margin-left:6px;">
                                <a href="https://cryptonite.finstreet.in/docs/Defi%20ebook.pdf" target="_blank" style="color:#000;">DOWNLOAD</a>
                            </div>
                        </div>
                    </div>
                    <div style="display:flex;justify-content:center;margin-top:20px;">
                        <div class="col-md-6" style="display:flex;justify-content:center;border:2px solid #fff;
                        border-radius:15px;padding:0;">
                            
                            <div class="col-md-7" style="padding:18px;text-align:left;">
                                <p style="margin-bottom:0px; font-weight: bold;">Crypto Cheat Sheet</p>
                            </div>
                            <div class="col-md-5" style="padding:18px;text-align:center;background-color:#fff;border-radius:15px;margin-left:6px;">
                                <a href="https://cryptonite.finstreet.in/docs/Crypto%20Cheat%20Sheets.pdf" target="_blank" style="color:#000;">DOWNLOAD</a>
                            </div>
                        </div>
                    </div>
                    <div style="display:flex;justify-content:center;margin-top:20px;">
                        <div class="col-md-6" style="display:flex;justify-content:center;border:2px solid #fff;
                        border-radius:15px;padding:0;">
                            
                            <div class="col-md-7" style="padding:18px;text-align:left;">
                                <p style="margin-bottom:0px; font-weight: bold;">Case Study</p>
                            </div>
                            <div class="col-md-5" style="padding:18px;text-align:center;background-color:#fff;border-radius:15px;margin-left:6px;">
                                <a href="https://cryptonite.finstreet.in/docs/Venezuela%20hyper%20inflation%20case%20study.pdf" target="_blank" style="color:#000;">DOWNLOAD</a>
                            </div>
                        </div>
                    </div>
                    <!-- <?php
                        if(!$new_batch){
                            ?>
                                <div style="display:flex;justify-content:center;margin-top:20px;">
                                    <div class="col-md-6" style="display:flex;justify-content:center;border:2px solid #fff;
                                    border-radius:15px;padding:0;">
                                        
                                        <div class="col-md-7" style="padding:18px;text-align:left;">
                                            <p style="margin-bottom:0px; font-weight: bold;">Certification Of Participation</p>
                                        </div>
                                        <div class="col-md-5" style="padding:18px;text-align:center;background-color:#fff;border-radius:15px;margin-left:6px;">
                                            <a href="https://cryptonite.finstreet.in/docs/Venezuela%20hyper%20inflation%20case%20study.pdf" target="_blank" id="certificate-desktop" style="color:#000;">DOWNLOAD</a>
                                        </div>
                                    </div>
                                </div>
                            
                            <?php
                        }
                    ?> -->
                    
                </div>
                <!-- tab 3 -->
                <div id="live-q&a" class="tabcontent">
                    
                    
                    <div style="display:flex;justify-content:center;">
                        <div class="col-md-6" style="display:flex;justify-content:center;border:2px solid #fff;
                        border-radius:15px;padding:0;">
                            <div class="col-md-7" style="padding:18px;text-align:left;">
                                <p style="margin-bottom:0px;">Join The Live Chat</p>
                            </div>
                            <div class="col-md-5" style="padding:18px;text-align:center;background-color:#fff;border-radius:15px;margin-left:6px;">
                                <a href="https://youtu.be/9T2qlwOW3FI" target="_blank" style="color:#000;">Join Now</a>
                            </div>
                        </div>
                    </div>
                            
                    <?php
                        if($new_batch == false){
                            ?>
                                <div style="display:flex;justify-content:center;" class="mt-3">
                                    <div class="col-md-6" style="display:flex;justify-content:center;border:2px solid #fff;
                                    border-radius:15px;padding:0;">
                                        <div class="col-md-7" style="padding:18px;text-align:left;">
                                            <p style="margin-bottom:0px;">Batch 2 May 1st</p>
                                        </div>
                                        <div class="col-md-5" style="padding:18px;text-align:center;background-color:#fff;border-radius:15px;margin-left:6px;">
                                            <a href="https://youtu.be/dWLaOQRl_Zs" target="_blank" style="color:#000;">View Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div style="display:flex;justify-content:center;" class="mt-3">
                                    <div class="col-md-6" style="display:flex;justify-content:center;border:2px solid #fff;
                                    border-radius:15px;padding:0;">
                                        <div class="col-md-7" style="padding:18px;text-align:left;">
                                            <p style="margin-bottom:0px;">Batch 2 May 2nd</p>
                                        </div>
                                        <div class="col-md-5" style="padding:18px;text-align:center;background-color:#fff;border-radius:15px;margin-left:6px;">
                                            <a href="https://www.youtube.com/watch?v=5LP3qtOOZ1g&feature=youtu.be" target="_blank" style="color:#000;">View Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div style="display:flex;justify-content:center;" class="mt-3">
                                    <div class="col-md-6" style="display:flex;justify-content:center;border:2px solid #fff;
                                    border-radius:15px;padding:0;">
                                        <div class="col-md-7" style="padding:18px;text-align:left;">
                                            <p style="margin-bottom:0px;">Batch 2 May 3rd</p>
                                        </div>
                                        <div class="col-md-5" style="padding:18px;text-align:center;background-color:#fff;border-radius:15px;margin-left:6px;">
                                            <a href="https://www.youtube.com/watch?v=ZK6zJoJPx90" target="_blank" style="color:#000;">View Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div style="display:flex;justify-content:center;" class="mt-3">
                                    <div class="col-md-6" style="display:flex;justify-content:center;border:2px solid #fff;
                                    border-radius:15px;padding:0;">
                                        <div class="col-md-7" style="padding:18px;text-align:left;">
                                            <p style="margin-bottom:0px;">Batch 1 April 14th</p>
                                        </div>
                                        <div class="col-md-5" style="padding:18px;text-align:center;background-color:#fff;border-radius:15px;margin-left:6px;">
                                            <a href="https://youtu.be/L1qm8j1_eGI" target="_blank" style="color:#000;">View Now</a>
                                        </div>
                                    </div>
                                </div>

                                <div style="display:flex;justify-content:center;" class="mt-3">
                                    <div class="col-md-6" style="display:flex;justify-content:center;border:2px solid #fff;
                                    border-radius:15px;padding:0;">
                                        <div class="col-md-7" style="padding:18px;text-align:left;">
                                            <p style="margin-bottom:0px;">Batch 1 April 15th</p>
                                        </div>
                                        <div class="col-md-5" style="padding:18px;text-align:center;background-color:#fff;border-radius:15px;margin-left:6px;">
                                            <a href="https://youtu.be/CJaBrGIroLg" target="_blank" style="color:#000;">View Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div style="display:flex;justify-content:center;" class="mt-3">
                                    <div class="col-md-6" style="display:flex;justify-content:center;border:2px solid #fff;
                                    border-radius:15px;padding:0;">
                                        <div class="col-md-7" style="padding:18px;text-align:left;">
                                            <p style="margin-bottom:0px;">Batch 1 April 16th</p>
                                        </div>
                                        <div class="col-md-5" style="padding:18px;text-align:center;background-color:#fff;border-radius:15px;margin-left:6px;">
                                            <a href="https://youtu.be/e_RNCZw8y7E" target="_blank" style="color:#000;">View Now</a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                    ?>
                    
                    

                    
                </div>
                <!-- tab 4 -->
                <div id="start-trading" class="tabcontent">
                    <div style="display:flex;justify-content:center;">
                        <div class="col-md-6" style="display:flex;justify-content:center;border:2px solid #fff;
                        border-radius:15px;padding:0;">
                            <div class="col-md-7" style="padding:18px;text-align:left;">
                                <p style="margin-bottom:0px;">Get started with crypto</p>
                            </div>
                            <div class="col-md-5" style="padding:18px;text-align:center;background-color:#fff;border-radius:15px;margin-left:6px;">
                                <a href="https://wazirx.com/invite/sp7pvbt6" target="_blank"  rel="NOFOLLOW" style="color:#000;">REGISTER NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer -->
        <!-- content -->
        <div class="container-fluid" style="background-color:#fff;">
            <div class="container" style="padding:30px 0px;margin:0 auto;">
                <b class="font-Oswald-b" style="display:block;text-align:center;font-size:20px;color:rgb(0, 75, 145);">
                Got Any Questions ? Write to us.</b>
                <br>
                <b class="font-roboto-r" style="display:block;text-align:center;font-size:20px;color:rgb(0, 75, 145);"><a style="color:rgb(0, 75, 145);" href="mailto:support@finstreet.in">support@finstreet.in</a></b>
                <b class="font-roboto-r" style="display:block;text-align:center;font-size:20px;color:rgb(0, 75, 145);">+91-8968232722</b>
            </div>
        </div>
        <!-- content 1 -->
        <!-- <div class="container-fluid" style="background-color:#000;">
            <div class="container" style="padding:30px 0px;margin:0 auto;">
                <b class="font-Oswald-b" style="display:block;text-align:center;font-size:14px;color:rgba(255, 255, 255, 0.53);">Copyright &copy; 2019 All Right Reserved. Designed By <a rel="nofollow" href="https://www.quadbtech.com" target="_blank">QuadBTech</a></b>
            </div>
        </div> -->
    </div>
    <!-- mobile view -->
    <div class="d-lg-none">
        <div class="fixed-top" style="padding: 50px 0px;background-color:#00abc9;outline:none;">
            <header>
                <div class="position-fixed h-100 w-100" style="opacity: 1; backdrop-filter: blur(8px); z-index: 16; display: none; top: 0px;" id="drawer">
                    <div class="container h-100 w-100 pr-0">
                        <div class="row h-100 w-100 mr-0 position-absolute">
                            <div class="col-2 d-flex justify-content-end pt-5 pl-0" id="cross" style="padding-right: 15px !important;">
                                <div id="mobile-cross">
                                    <p class="m-0" style="font-size: 30px;color:#fff;">X</p>
                                </div>
                            </div>
                            <div class="col-10 position-relative" style="background: #00abc9 0% 0% no-repeat padding-box;">
                                <div class="position-absolute w-100" style="top:35%;">
                                    <p class="footer-text font-weight-light text-center" style="font-size:30px;margin-bottom:10px; font-family: europhonic;color:#fff;" onclick="window.location = 'user-login'">Logout</p>
                                </div>                          
                            </div>                        
                        </div>                
                    </div>                
                </div>        
                <div class="nav-container">
                    <div id="mobile-navbar">
                        <div style="position: fixed;z-index: 10;right: 20px;margin-top: -30px;z-index:15 !important;" id="open-drawer">
                            <hr style="width: 40px;height: 4px;background-color: white;margin-top: 10px;margin-bottom: 0px;border-radius: 100px;">
                            <hr style="width: 40px;height: 4px;background-color: white;margin-top: 10px;margin-bottom: 0px;border-radius: 100px;">
                            <hr style="width: 40px;height: 4px;background-color: white;margin-top: 10px;margin-bottom: 0px;border-radius: 100px;">
                        </div>
                        <div class="d-flex position-fixed align-items-center w-100" style="z-index: 10;margin-top: -30px;margin-left: 15px;">
                            <a class="navbar-brand header-text" id="mobile-header-logo-text" href="/">
                                <img class="logo-header" src="images/logo.png" alt="" style="width: 150px;">
                            </a>
                        </div>
                    </div>
                </div>            
            </header>
        </div>
        <!-- main content -->
        <div class="container-fluid px-0 d-flex justify-content-center" style="margin-top:116px;background-color:black">
            
                <!-- <iframe width="100%" height="100%" src="https://www.youtube.com/embed/4qMQDZvxHHU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe> -->
                <!-- <iframe width="100%" height="250" src="https://www.youtube.com/embed/TVkAE1lhKK0?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->

                <video id="video_1_mobile" class="video-js vjs-default-skin vjs-big-play-centered" width="320" height="180" controls data-setup='{}'>
                    <source src="videos/day<?php echo $day; ?>/media_720.m3u8" type='application/x-mpegURL' label='720p' res='720' />
                    <source src="videos/day<?php echo $day; ?>/media_540.m3u8" type='application/x-mpegURL' label='540p' res='540' />
                    <source src="videos/day<?php echo $day; ?>/media_360.m3u8" type='application/x-mpegURL' label='360p' res='360'/>
                    <source src="videos/day<?php echo $day; ?>/media_270.m3u8" type='application/x-mpegURL' label='270p' res='270'/>
                    <source src="videos/day<?php echo $day; ?>/media_180.m3u8" type='application/x-mpegURL' label='180p' res='180'/>
                </video>
            
        </div>
        <!-- main content 1 -->
        <div class="container-fluid">
            <div class="container" style="padding:20px 0px;">
                <div class="tab font-roboto-b">
                    <button class="tablinks" onclick="openCity(event, 'select-day-mobile')" id="defaultOpen-mobile" style="font-size:15px;">Select Day</button>
                    <button class="tablinks" onclick="openCity(event, 'Downloadable-mobile')" style="font-size:15px;">Downloads</button>
                    <button class="tablinks" onclick="openCity(event, 'live-q&a-mobile')" style="font-size:15px;">Live Q&A</button>
                    <button class="tablinks" onclick="openCity(event, 'start-trading-mobile')" style="font-size:15px;">Start Trading</button>
                </div> 
                <hr style="border:1px solid #d2d2d2;">
                <!-- tab 1 -->
                <div id="select-day-mobile" class="tabcontent font-roboto-r">
                    <div style="display:flex;justify-content:center;">
                        <div class="row" style="display:flex;justify-content:center;border:2px solid #fff;
                        border-radius:18px;padding:0;">
                            <div class="col-7" style="padding:12px;text-align:left;">
                                <p style="margin-bottom:0px;"><b style="padding-right:7px;">DAY:1</b>Intro to Cryptocurrency</p>
                            </div>
                            <div class="col-5 d-flex justify-content-center align-items-center" style="padding:12px;text-align:center;background-color:#fff;border-radius:15px;">
                                <?php 
                                    
                                    if($day == "1"){ 
                                        echo '<a href="#" style="color:#000;">Now Watching</a>'; 
                                    } else{
                                        if($new_batch){
                                            if(strtotime($eventDay1) - strtotime($currentDate) < 0){
                                                echo '<a href="cryptonite?day=1" style="color:#000;">Watch Now</a>';
                                            }else{
                                                echo '<a style="color:#000;">Unlocks in '.round((int)abs(strtotime($eventDay1) - strtotime($currentDate))/(60*60)).' Hours</a>';
                                                
                                            }
                                        }else{
                                            echo '<a href="cryptonite?day=1" style="color:#000;">Watch Now</a>';
                                        }
                                        
                                    }
                                
                                ?>
                            </div>
                        </div>
                    </div>
                    <div style="display:flex;justify-content:center;margin-top:20px;">
                        <div class="row" style="display:flex;justify-content:center;border:2px solid #fff;
                        border-radius:18px;padding:0;">
                            <div class="col-7" style="padding:12px;text-align:left;">
                                <p style="margin-bottom:0px;"><b style="padding-right:7px;">DAY:2</b>How to Trade in Cryptocurrency</p>
                            </div>
                            <div class="col-5 d-flex justify-content-center align-items-center" style="padding:12px;text-align:center;background-color:#fff;border-radius:15px;">
                                <?php 
                                    
                                    if($day == "2"){ 
                                        echo '<a href="#" style="color:#000;">Now Watching</a>'; 
                                    } else{
                                        if($new_batch){
                                            if(strtotime($eventDay2) - strtotime($currentDate) < 0){
                                                echo '<a href="cryptonite?day=2" style="color:#000;">Watch Now</a>';
                                            }else{
                                                echo '<a style="color:#000;">Unlocks in '.round((int)abs(strtotime($eventDay2) - strtotime($currentDate))/(60*60)).' Hours</a>';
                                                
                                            }
                                            
                                        }else{
                                            echo '<a href="cryptonite?day=2" style="color:#000;">Watch Now</a>';
                                        }
                                        
                                    }
                                
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="lock2" style="display:flex;justify-content:center;margin-top: -76px;">
                        <div class="col-xs-12" style="display:flex;justify-content:center;border:2px solid #fff;border-radius:15px;background-color: #000;opacity: 0.7;">                            
                            <div class="wideCountdown clearfix cdLabelBold cdWhite cdLabelWhite cdStyleCircleLine wideCountdownSize1 is-countdown font-poppins-bold" data-date="03/26/2020" data-time="14" data-tz="india" data-url="#" data-lang="eng" data-color-time="rgb(255, 255, 255)" data-color-label="rgba(255, 255, 255, 0.3)" style="padding: 15px 0px 5px 0px;font-size:9px;display: grid;justify-content: center;">
                                <span class="countdown-row countdown-show4">
                                    <span class="countdown-section" style="padding:0px 5px;">
                                        <span class="days2 countdown-amount font-poppins-regular" style="font-size:10px;min-width: 44px;">0</span>                                        
                                        <span class="countdown-period font-poppins-regular" style="font-size:10px;min-width: 44px;">Days</span>
                                    </span>
                                    <span class="countdown-section" style="padding:0px 5px;">
                                        <span class="hours2 countdown-amount font-poppins-regular" style="font-size:10px;min-width: 44px;">00</span>
                                        <span class="countdown-period font-poppins-regular" style="font-size:10px;">Hours</span>
                                    </span>
                                    <span class="countdown-section" style="padding:0px 5px;">
                                        <span class="mins2 countdown-amount font-poppins-regular" style="font-size:10px;min-width: 44px;">00</span>
                                        <span class="countdown-period font-poppins-regular" style="font-size:10px;">Minutes</span>
                                    </span>
                                    <span class="countdown-section" style="padding:0px 5px;">
                                        <span class="secs2 countdown-amount font-poppins-regular" style="font-size:10px;min-width: 44px;">00</span>
                                        <span class="countdown-period font-poppins-regular" style="font-size: 10px;">Seconds</span>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div> -->
                    <div style="display:flex;justify-content:center;margin-top:20px;">
                        <div class="row" style="display:flex;justify-content:center;border:2px solid #fff;
                        border-radius:18px;padding:0;">
                            <div class="col-7" style="padding:12px;text-align:left;">
                                <p style="margin-bottom:0px;"><b style="padding-right:7px;">DAY:3</b>Prepairing for the Next Wave</p>
                            </div>
                            <div class="col-5 d-flex justify-content-center align-items-center" style="padding:12px;text-align:center;background-color:#fff;border-radius:15px;">
                                <?php 
                                        
                                    if($day == "3"){ 
                                        echo '<a href="#" style="color:#000;">Now Watching</a>'; 
                                    } else{
                                        if($new_batch){
                                            if(strtotime($eventDay3) - strtotime($currentDate) < 0){
                                                echo '<a href="cryptonite?day=3" style="color:#000;">Watch Now</a>';
                                            }else{
                                                echo '<a style="color:#000;">Unlocks in '.round((int)abs(strtotime($eventDay3) - strtotime($currentDate))/(60*60)).' Hours</a>';
                                                
                                            }
                                        }else{
                                            echo '<a href="cryptonite?day=3" style="color:#000;">Watch Now</a>';
                                        }
                                        
                                    }
                                    
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="lock3" style="display:flex;justify-content:center;margin-top: -76px;">
                        <div class="col-xs-12" style="display:flex;justify-content:center;border:2px solid #fff;border-radius:15px;background-color: #000;opacity: 0.7;">                            
                            <div class="wideCountdown clearfix cdLabelBold cdWhite cdLabelWhite cdStyleCircleLine wideCountdownSize1 is-countdown font-poppins-bold" data-date="03/26/2020" data-time="14" data-tz="india" data-url="#" data-lang="eng" data-color-time="rgb(255, 255, 255)" data-color-label="rgba(255, 255, 255, 0.3)" style="padding: 15px 0px 5px 0px;font-size:9px;display: grid;justify-content: center;">
                                <span class="countdown-row countdown-show4">
                                    <span class="countdown-section" style="padding:0px 5px;">
                                        <span class="days3 countdown-amount font-poppins-regular" style="font-size:10px;min-width: 44px;">0</span>                                        
                                        <span class="countdown-period font-poppins-regular" style="font-size:10px;min-width: 44px;">Days</span>
                                    </span>
                                    <span class="countdown-section" style="padding:0px 5px;">
                                        <span class="hours3 countdown-amount font-poppins-regular" style="font-size:10px;min-width: 44px;">00</span>
                                        <span class="countdown-period font-poppins-regular" style="font-size:10px;">Hours</span>
                                    </span>
                                    <span class="countdown-section" style="padding:0px 5px;">
                                        <span class="mins3 countdown-amount font-poppins-regular" style="font-size:10px;min-width: 44px;">00</span>
                                        <span class="countdown-period font-poppins-regular" style="font-size:10px;">Minutes</span>
                                    </span>
                                    <span class="countdown-section" style="padding:0px 5px;">
                                        <span class="secs3 countdown-amount font-poppins-regular" style="font-size:10px;min-width: 44px;">00</span>
                                        <span class="countdown-period font-poppins-regular" style="font-size: 10px;">Seconds</span>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>                     -->
                </div>
                <!-- tab 2 -->
                <div id="Downloadable-mobile" class="tabcontent font-roboto-r">
                    <div>
                        <div class="row" style="display:flex;justify-content:center;border:2px solid #fff;border-radius:18px;padding:0;">
                            <div class="col-7" style="padding:12px;text-align:left;">
                                <p style="margin-bottom:0px;"><b style="padding-right:7px;">Crypto Glossary</b></p>
                            </div>
                            <div class="col-5" style="padding:12px;text-align:center;background-color:#fff;border-radius:15px;">
                                <a href="https://cryptonite.finstreet.in/docs/Finstreet%20Crypto%20Glossary.pdf" target="_blank" style="color:#000;">DOWNLOAD</a>
                            </div>
                        </div>
                        
                    </div>
                    <div style="margin-top:20px;">
                        <div class="row" style="display:flex;justify-content:center;border:2px solid #fff;
                        border-radius:18px;padding:0;">
                            <div class="col-7" style="padding:12px;text-align:left;">
                                <p style="margin-bottom:0px;"><b style="padding-right:7px;">DeFi E-Book</b></p>
                            </div>
                            <div class="col-5" style="padding:12px;text-align:center;background-color:#fff;border-radius:15px;">
                                <a href="https://cryptonite.finstreet.in/docs/Defi%20ebook.pdf" target="_blank" style="color:#000;">DOWNLOAD</a>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top:20px;">
                        <div class="row" style="display:flex;justify-content:center;border:2px solid #fff;
                        border-radius:18px;padding:0;">
                            <div class="col-7" style="padding:12px;text-align:left;">
                                <p style="margin-bottom:0px;"><b style="padding-right:7px;">Crypto Cheat Sheet</b></p>
                            </div>
                            <div class="col-5" style="padding:12px;text-align:center;background-color:#fff;border-radius:15px;">
                                <a href="https://cryptonite.finstreet.in/docs/Crypto%20Cheat%20Sheets.pdf" target="_blank" style="color:#000;">DOWNLOAD</a>
                            </div>
                        </div>
                    </div>   
                    <div style="margin-top:20px;">
                        <div class="row" style="display:flex;justify-content:center;border:2px solid #fff;
                        border-radius:18px;padding:0;">
                            <div class="col-7" style="padding:12px;text-align:left;">
                                <p style="margin-bottom:0px;"><b style="padding-right:7px;">Case Study</b></p>
                            </div>
                            <div class="col-5" style="padding:12px;text-align:center;background-color:#fff;border-radius:15px;">
                                <a href="https://cryptonite.finstreet.in/docs/Venezuela%20hyper%20inflation%20case%20study.pdf" target="_blank" style="color:#000;">DOWNLOAD</a>
                            </div>
                        </div>
                    </div>     
                    
                    <!-- <?php
                        if(!$new_batch){
                            ?>
                                <div style="margin-top:20px;">
                                    <div class="row" style="display:flex;justify-content:center;border:2px solid #fff;
                                    border-radius:18px;padding:0;">
                                        <div class="col-7" style="padding:12px;text-align:left;">
                                            <p style="margin-bottom:0px;"><b style="padding-right:7px;">Certificate Of Participation</b></p>
                                        </div>
                                        <div class="col-5 d-flex justify-content-center align-items-center" style="padding:12px;text-align:center;background-color:#fff;border-radius:15px;">
                                            <a href="https://cryptonite.finstreet.in/docs/Venezuela%20hyper%20inflation%20case%20study.pdf" id="certificate-mobile" target="_blank" style="color:#000;">DOWNLOAD</a>
                                        </div>
                                    </div>
                                </div>  
                            
                            <?php
                        }
                    ?> -->
                                 
                </div>
                <!-- tab 3 -->
                <div id="live-q&a-mobile" class="tabcontent">
                    <div style="display:flex;justify-content:center;">
                        <div class="col-md-6" style="display:flex;justify-content:center;border:2px solid #fff;
                        border-radius:15px;padding:0;">
                            <div class="col-8" style="padding:18px;text-align:left;">
                                <p style="margin-bottom:0px;">Join The Live Chat</p>
                            </div>
                            <div class="col-4" style="padding:18px;text-align:center;background-color:#fff;border-radius:15px;margin-left:6px;">
                                <a href="https://youtu.be/9T2qlwOW3FI" target="_blank" style="color:#000;">Join</a>
                            </div>
                        </div>
                    </div>
                    <?php
                        if($new_batch == false){
                            ?>

                                <div style="display:flex;justify-content:center;" class="mt-3">
                                    <div class="col-md-6" style="display:flex;justify-content:center;border:2px solid #fff;
                                    border-radius:15px;padding:0;">
                                        <div class="col-8" style="padding:18px;text-align:left;">
                                            <p style="margin-bottom:0px;">Batch 2 May 1st</p>
                                        </div>
                                        <div class="col-4" style="padding:18px;text-align:center;background-color:#fff;border-radius:15px;margin-left:6px;">
                                            <a href="https://youtu.be/dWLaOQRl_Zs" target="_blank" style="color:#000;">View</a>
                                        </div>
                                    </div>
                                </div>
                                <div style="display:flex;justify-content:center;" class="mt-3">
                                    <div class="col-md-6" style="display:flex;justify-content:center;border:2px solid #fff;
                                    border-radius:15px;padding:0;">
                                        <div class="col-8" style="padding:18px;text-align:left;">
                                            <p style="margin-bottom:0px;">Batch 2 May 2nd</p>
                                        </div>
                                        <div class="col-4" style="padding:18px;text-align:center;background-color:#fff;border-radius:15px;margin-left:6px;">
                                            <a href="https://www.youtube.com/watch?v=5LP3qtOOZ1g&feature=youtu.be" target="_blank" style="color:#000;">View</a>
                                        </div>
                                    </div>
                                </div>
                                <div style="display:flex;justify-content:center;" class="mt-3">
                                    <div class="col-md-6" style="display:flex;justify-content:center;border:2px solid #fff;
                                    border-radius:15px;padding:0;">
                                        <div class="col-8" style="padding:18px;text-align:left;">
                                            <p style="margin-bottom:0px;">Batch 2 May 3rd</p>
                                        </div>
                                        <div class="col-4" style="padding:18px;text-align:center;background-color:#fff;border-radius:15px;margin-left:6px;">
                                            <a href="https://www.youtube.com/watch?v=ZK6zJoJPx90" target="_blank" style="color:#000;">View</a>
                                        </div>
                                    </div>
                                </div>
                                <div style="display:flex;justify-content:center;" class="mt-3">
                                    <div class="col-md-6" style="display:flex;justify-content:center;border:2px solid #fff;
                                    border-radius:15px;padding:0;">
                                        <div class="col-8" style="padding:18px;text-align:left;">
                                            <p style="margin-bottom:0px;">Batch 1 April 14th</p>
                                        </div>
                                        <div class="col-4" style="padding:18px;text-align:center;background-color:#fff;border-radius:15px;margin-left:6px;">
                                            <a href="https://youtu.be/L1qm8j1_eGI" target="_blank" style="color:#000;">View</a>
                                        </div>
                                    </div>
                                </div>
                                <div style="display:flex;justify-content:center;" class="mt-3">
                                    <div class="col-md-6" style="display:flex;justify-content:center;border:2px solid #fff;
                                    border-radius:15px;padding:0;">
                                        <div class="col-8" style="padding:18px;text-align:left;">
                                            <p style="margin-bottom:0px;">Batch 1 April 15th</p>
                                        </div>
                                        <div class="col-4" style="padding:18px;text-align:center;background-color:#fff;border-radius:15px;margin-left:6px;">
                                            <a href="https://youtu.be/CJaBrGIroLg" target="_blank" style="color:#000;">View</a>
                                        </div>
                                    </div>
                                </div>
                                <div style="display:flex;justify-content:center;" class="mt-3">
                                    <div class="col-md-6" style="display:flex;justify-content:center;border:2px solid #fff;
                                    border-radius:15px;padding:0;">
                                        <div class="col-8" style="padding:18px;text-align:left;">
                                            <p style="margin-bottom:0px;">Batch 1 April 16th</p>
                                        </div>
                                        <div class="col-4" style="padding:18px;text-align:center;background-color:#fff;border-radius:15px;margin-left:6px;">
                                            <a href="https://youtu.be/e_RNCZw8y7E" target="_blank" style="color:#000;">View</a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                    ?>
                    


                </div>
                <!-- tab 4 -->
                <div id="start-trading-mobile" class="tabcontent">
                    <div style="display:flex;justify-content:center;">
                        <div class="col-md-6" style="display:flex;justify-content:center;border:2px solid #fff;
                        border-radius:15px;padding:0;">
                            <div class="col-md-8" style="padding:18px;text-align:left;">
                                <p style="margin-bottom:0px;">Get started with crypto</p>
                            </div>
                            <div class="col-md-4" style="padding:18px;text-align:center;background-color:#fff;border-radius:15px;">
                                <a href="https://wazirx.com/invite/sp7pvbt6" target="_blank" rel="NOFOLLOW" style="color:#000;">REGISTER NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer -->
        <!-- content -->
        <div class="container-fluid" style="background-color:#fff;">
            <div class="container" style="padding:30px 0px;margin:0 auto;">
                <b class="font-Oswald-b" style="display:block;text-align:center;font-size:20px;color:rgb(0, 75, 145);">
                Got Any Questions ? Write to us.</b>
                <br>
                <b class="font-roboto-r" style="display:block;text-align:center;font-size:20px;color:rgb(0, 75, 145);"><a style="color:rgb(0, 75, 145);" href="mailto:support@finstreet.in">support@finstreet.in</a></b>
                <b class="font-roboto-r" style="display:block;text-align:center;font-size:20px;color:rgb(0, 75, 145);">+91-8968232722</b>
            </div>
        </div>
        <!-- content 1 -->
        <!-- <div class="container-fluid" style="background-color:#000;padding-bottom:70px;">
            <div class="container" style="padding:30px 0px;margin:0 auto;">
                <b class="font-Oswald-b" style="display:block;text-align:center;font-size:16px;color:rgba(255, 255, 255, 0.53);"> Copyright &copy; 2019 All Right Reserved. Designed By <a rel="nofollow" href="https://www.quadbtech.com" target="_blank">QuadBTech</a></b>
            </div>
        </div> -->
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        //open mobile drawer
        $("#drawer").css('display','none');
        $("#open-drawer").on("click",function(){
            if($("#drawer").css('display') == 'none'){
                $("#drawer").css('display','block');
            } else{
                $("#drawer").css('display','none');
            }
        });
        $("#cross").on("click",function(){
            $("#drawer").css('display','none');
        });

        var email = sessionStorage.getItem('useremail');

        if(email == null){
            window.location = "user-login";
        }

        var certiName = email.toString().replace("@", "-");
        var certiName = certiName.replace(".", "-");
        $("#certificate-desktop").attr("href","docs/certificate/" + certiName + ".pdf");
        $("#certificate-mobile").attr("href","docs/certificate/" + certiName + ".pdf");

        // tab js
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
            // Get the element with id="defaultOpen" and click on it
            if(window.innerWidth >= 960){
                document.getElementById("defaultOpen").click();
            }else{
                document.getElementById("defaultOpen-mobile").click();
            }

        
        // if(window.innerWidth >= 960){

        //     // The data/time we want to countdown to
        //     var countDownDate = new Date("apr 13, 2020 18:00:00").getTime();
        //     var countDownDate1 = new Date("apr 14, 2020 18:00:00").getTime();

        //     // Run myfunc every second
        //     var myfunc = setInterval(function() {

        //         var now = new Date().getTime();
        //         var timeleft = countDownDate - now;
                    
        //         // Calculating the days, hours, minutes and seconds left
        //         var days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
        //         var hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        //         var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
        //         var seconds = Math.floor((timeleft % (1000 * 60)) / 1000);

        //         var now1 = new Date().getTime();
        //         var timeleft1 = countDownDate1 - now1;
                    
        //         // Calculating the days, hours, minutes and seconds left
        //         var days1 = Math.floor(timeleft1 / (1000 * 60 * 60 * 24));
        //         var hours1 = Math.floor((timeleft1 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        //         var minutes1 = Math.floor((timeleft1 % (1000 * 60 * 60)) / (1000 * 60));
        //         var seconds1 = Math.floor((timeleft1 % (1000 * 60)) / 1000);
                    
        //         // Result is output to the specific element
        //         document.getElementsByClassName("days").innerHTML = days 
        //         document.getElementsByClassName("hours").innerHTML = hours 
        //         document.getElementsByClassName("mins").innerHTML = minutes 
        //         document.getElementsByClassName("secs").innerHTML = seconds    
                    
        //         // timer2
        //         document.getElementsByClassName("days1").innerHTML = days1 
        //         document.getElementsByClassName("hours1").innerHTML = hours1 
        //         document.getElementsByClassName("mins1").innerHTML = minutes1 
        //         document.getElementsByClassName("secs1").innerHTML = seconds1 

        //         // Display the message when countdown is over
        //         if (timeleft < 0) {
        //             // clearInterval(myfunc);
        //             document.getElementsByClassName("days").innerHTML = "00"
        //             document.getElementsByClassName("hours").innerHTML = "00" 
        //             document.getElementsByClassName("mins").innerHTML = "00"
        //             document.getElementsByClassName("secs").innerHTML = "00"

        //             document.getElementsByClassName("end").innerHTML = "TIME UP!!";
                    
        //         }
        //         // Display the message when countdown is over
        //         if (timeleft1 < 0) {
        //             clearInterval(myfunc);
        //             document.getElementsByClassName("days1").innerHTML = "00"
        //             document.getElementsByClassName("hours1").innerHTML = "00" 
        //             document.getElementsByClassName("mins1").innerHTML = "00"
        //             document.getElementsByClassName("secs1").innerHTML = "00"

        //             document.getElementsByClassName("end1").innerHTML = "TIME UP!!";    
        //         }
        //         if(timeleft > 0){
                    
        //         }
        //         else{
        //             $('.link').attr('href', 'www.google.com');
        //             $(".lock").css("display", "none");
        //             $('.link').html('Watch Now');
        //         }
        //         if(timeleft1 > 0){
                    
        //         }
        //         else{
        //             $('.link1').attr('href', 'www.youtube.com');
        //             $(".lock1").css("display", "none");
        //             $('.link1').html('Watch Now');
        //         }
        //     }, 1000);
        // }else{
        //     // The data/time we want to countdown to
        //     var countDownDate2 = new Date("apr 13, 2020 18:00:00").getTime();
        //     var countDownDate3 = new Date("apr 14, 2020 18:00:00").getTime();

        //     // Run myfunc every second
        //     var myfunc = setInterval(function() {

        //         var now2 = new Date().getTime();
        //         var timeleft2 = countDownDate2 - now2;
                    
        //         // Calculating the days, hours, minutes and seconds left
        //         var days2 = Math.floor(timeleft2 / (1000 * 60 * 60 * 24));
        //         var hours2 = Math.floor((timeleft2 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        //         var minutes2 = Math.floor((timeleft2 % (1000 * 60 * 60)) / (1000 * 60));
        //         var seconds2 = Math.floor((timeleft2 % (1000 * 60)) / 1000);

        //         var now3 = new Date().getTime();
        //         var timeleft3 = countDownDate3 - now3;
                    
        //         // Calculating the days, hours, minutes and seconds left
        //         var days3 = Math.floor(timeleft3 / (1000 * 60 * 60 * 24));
        //         var hours3 = Math.floor((timeleft3 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        //         var minutes3 = Math.floor((timeleft3 % (1000 * 60 * 60)) / (1000 * 60));
        //         var seconds3 = Math.floor((timeleft3 % (1000 * 60)) / 1000);
                    
        //         // Result is output to the specific element
        //         document.getElementsByClassName("days2").innerHTML = days2 
        //         document.getElementsByClassName("hours2").innerHTML = hours2 
        //         document.getElementsByClassName("mins2").innerHTML = minutes2 
        //         document.getElementsByClassName("secs2").innerHTML = seconds2   
                    
        //         // timer2
        //         document.getElementsByClassName("days3").innerHTML = days3 
        //         document.getElementsByClassName("hours3").innerHTML = hours3 
        //         document.getElementsByClassName("mins3").innerHTML = minutes3 
        //         document.getElementsByClassName("secs3").innerHTML = seconds3 

        //         // Display the message when countdown is over
        //         if (timeleft2 < 0) {
        //             // clearInterval(myfunc);
        //             document.getElementsByClassName("days2").innerHTML = "00"
        //             document.getElementsByClassName("hours2").innerHTML = "00" 
        //             document.getElementsByClassName("mins2").innerHTML = "00"
        //             document.getElementsByClassName("secs2").innerHTML = "00"

        //             document.getElementsByClassName("end2").innerHTML = "TIME UP!!";
                    
        //         }
        //         // Display the message when countdown is over
        //         if (timeleft2 < 0) {
        //             clearInterval(myfunc);
        //             document.getElementsByClassName("days3").innerHTML = "00"
        //             document.getElementsByClassName("hours3").innerHTML = "00" 
        //             document.getElementsByClassName("mins3").innerHTML = "00"
        //             document.getElementsByClassName("secs3").innerHTML = "00"

        //             document.getElementsByClassName("end3").innerHTML = "TIME UP!!";    
        //         }
        //         if(timeleft2 > 0){
                    
        //         }
        //         else{
        //             $('.link2').attr('href', 'www.google.com');
        //             $(".lock2").css("display", "none");
        //             $('.link2').html('Watch Now');
        //         }
        //         if(timeleft3 > 0){
                    
        //         }
        //         else{
        //             $('.link3').attr('href', 'www.youtube.com');
        //             $(".lock3").css("display", "none");
        //             $('.link3').html('Watch Now');
        //         }
        //     }, 1000);   
        // }
    </script>

<script src="https://vjs.zencdn.net/7.7.5/video.js"></script>
  <!-- <script>
    videojs.options.flash.swf = "../node_modules/video.js/dist/video-js.swf"
  </script> -->
  <script src="lib/videojs-resolution-switcher.js"></script>
  <script>
    // fire up the plugin
    videojs('video', {
      controls: true,
    //   muted: true,
    //   width: 1000,
      plugins: {
        videoJsResolutionSwitcher: {
          ui: true,
          default: 540, // Default resolution [{Number}, 'low', 'high'],
          dynamicLabel: true // Display dynamic labels or gear symbol
        }
      }
    }, function(){
      var player = this;
      window.player = player

      // player.updateSrc([
      //   {
      //     src: 'https://vjs.zencdn.net/v/oceans.mp4?sd',
      //     type: 'videos/mp4',
      //     label: '360p',
      //     res: 360
      //   },
      //   {
      //     src: 'https://vjs.zencdn.net/v/oceans.mp4?hd',
      //     type: 'videos/mp4',
      //     label: '540p',
      //     res: 540
      //   }
      // ])

      player.on('resolutionchange', function(){
        console.info('Source changed to %s', player.src());
      })

    })
  </script>


  <script>
    videojs('video_1').videoJsResolutionSwitcher({
        default: 540,
        dynamicLabel: true
    });
    videojs('video_1_mobile').videoJsResolutionSwitcher({
        default: 270,
        dynamicLabel: true
    });
  </script>

</body>
</html>
