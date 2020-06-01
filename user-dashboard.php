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

date_default_timezone_set("Asia/Calcutta");

//video start timestamp for day 1, 2 and 3
$eventDay1 = date("Y-m-d H:i:s", mktime(18, 00, 00, 5, 15, 2020));
$eventDay2 = date("Y-m-d H:i:s", mktime(18, 00, 00, 5, 16, 2020));
$eventDay3 = date("Y-m-d H:i:s", mktime(18, 00, 00, 5, 17, 2020));

//intro to make dir
//mktime(hour, minute, second, month, day, year)

//current date
$currentDate = date("Y-m-d H:i:s");

// glosarry timer
// $countDownDate12 = "apr 20, 2020 24:00:00";
$countDownDate12 = date("Y-m-d H:i:s", mktime(24, 00, 00, 5, 8, 2020));

//bonus content timer
// $countDownDate13 = "apr 25, 2020 24:00:00";
$countDownDate13 = date("Y-m-d H:i:s", mktime(24, 00, 00, 5, 10, 2020));

//life changing seminar timer
// $countDownDate14 = "apr 28, 2020 24:00:00";
$countDownDate14 = date("Y-m-d H:i:s", mktime(24, 00, 00, 5, 12, 2020));

//how to defi timer
// $countDownDate15 = "apr 30, 2020 24:00:00";
$countDownDate15 = date("Y-m-d H:i:s", mktime(24, 00, 00, 5, 14, 2020));

//participation certificate timer
// $countDownDate16 = "may 3, 2020 21:00:00";
$countDownDate16 = date("Y-m-d H:i:s", mktime(20, 45, 00, 5, 17, 2020));

// Event start timer 
// $countDownDate1 = "may 1, 2020 18:00:00";
$countDownDate1 = date("Y-m-d H:i:s", mktime(18, 00, 00, 5, 15, 2020));

// blockchain certificate countdown
// $countDownDate2 = "may 25, 2020 24:00:00";
$countDownDate2 = date("Y-m-d H:i:s", mktime(24, 00, 00, 5, 25, 2020));
// echo (strtotime($currentDate) - strtotime($countDownDate15));


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
            } else if($product_name == 'Crypto-Nite2'){
                $new_batch = false;
            } else if($product_name == 'Crypto-Nite 2020'){
                $new_batch = false;
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
<html lang="en">

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

    <title>User Dashboard | Finstreet | India's 1st ever Financial Freedom Coach</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/cropped-Fin-270x270.jpg">
    <script src="https://use.fontawesome.com/ebc80d226d.js"></script>

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

<body style="background-color: #00ABC9;">

    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PFRW8HP"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    
    <div class="d-none d-lg-block position-relative">
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

        <!-- pop for event click -->
        <div id="event-pop" class="position-fixed w-100 h-100 justify-content-center align-items-center" style="z-index: 100; background-color: #00ABC9; display: none;" >
            <div class="w-50">
                <h2 class="font-poppins-bold text-white" >EVENT STARTS IN</h2>
                <h2 class="font-poppins-bold text-white" ><span class="days1">23</span> DAYS <span class="hours1">5</span> HOURS <span class="mins1">8</span> MINUTES <span class="secs1">2</span> SECONDS</h2>
                <p class="text-center text-white cursor-pointer mt-4" style="text-decoration: underline; opacity: 0.9;" id="go-back"> Go Back</p>
            </div>
        </div>
        <!-- page content -->
        <div class="container-fluid" style="padding-top: 150px; background-color: #00ABC9;"> 
            

            <div class="w-100 d-flex justify-content-center align-items-center">
                <div class="w-50">
                    <h1 class="text-white text-center text-uppercase font-poppins-bold">Welcome <span class="name"><?php echo $name; ?></span></h1>
                    <!-- events -->
                    <div class="bg-white w-100 mt-3 p-3" style="border-radius: 30px;">
                        <h3 class="text-center font-poppins-bold mb-3">YOUR EVENTS</h3>
                        <div class="w-100" style="border-radius: 10px; border: 1px solid lightgray;">
                            <div class="container-fluid">
                                <div class="row p-2">
                                    <div class="col-md-5 pl-0">
                                        <img src="images/image.jpg" class="w-100" style="border-radius: 10px;">
                                    </div>
                                    <div class="col-md-7 pr-0">
                                        <h3 class="font-poppins-bold w-100">CRYPTO-NITE 2020</h3>
                                        
                                        <?php 
                                        
                                            if($new_batch == false){
                                                ?>  
                                                    
                                                    <button class="mt-2 btn btn-primary font-poppins-bold" style="font-size: 25px;" onclick="window.location = 'cryptonite?day=1'">Watch Videos >></button>
                                                <?php
                                            } else if($new_batch == true){
                                                ?>
                                                    <p class="font-poppins-regular mb-0">Start Date : <?php echo date_format(date_create($eventDay1), "d/m/Y");?></p>
                                                    <p class="font-poppins-regular mb-0">End Date : <?php echo date_format(date_create($eventDay3), "d/m/Y");?></p>
                                                <?php
                                                if(strtotime($eventDay3) - strtotime($currentDate) < 0){
                                                    ?>
                                                        
                                                        <button class="mt-2 btn btn-primary font-poppins-bold" style="font-size: 25px;"  onclick="window.location = 'cryptonite?day=3'">Go To Event >></button> 
                                                    
                                                    <?php 
                                                }else if(strtotime($eventDay2) - strtotime($currentDate) < 0){
                                                    ?>
                                                        <button class="mt-2 btn btn-primary font-poppins-bold" style="font-size: 25px;"  onclick="window.location = 'cryptonite?day=2'">Go To Event >></button> 
                                                    
                                                    <?php 
                                                }else if(strtotime($eventDay1) - strtotime($currentDate) < 0){
                                                    ?>
                                                        <button class="mt-2 btn btn-primary font-poppins-bold" style="font-size: 25px;"  onclick="window.location = 'cryptonite?day=1'">Go To Event >></button> 
                                                    
                                                    <?php 
                                                }else {
                                                    ?>
                                                        <button class="mt-2 btn btn-primary font-poppins-bold" style="font-size: 25px;" id="event">Go To Event >></button> 
                                                    
                                                    <?php 
                                                }
                                                
                                                
                                            }
                                        ?>
                                        

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 d-flex justify-content-center align-items-center w-100">
                            <div style="width: 30px; height: 30px; border-radius: 50%; border: 1px solid black;" class="d-flex justify-content-center align-items-center cursor-pointer"  data-toggle="modal" data-target="#event-popup">
                                <i class="fa fa-plus" style="color: black;"></i>
                            </div>
                        </div>
                    </div>
                    <!-- your courses -->
                    <div class="bg-white w-100 mt-3 p-3" style="border-radius: 30px;">
                        <h3 class="text-center font-poppins-bold mb-3">YOUR COURSES</h3>
                        <div class="w-100" style="border-radius: 10px; border: 1px solid lightgray;">
                            <h5 class="font-poppins-bold w-100 text-center p-3">You Haven't Subscribed to a course yet</h5>
                        </div>
                        <div class="mt-3 d-flex justify-content-center align-items-center w-100">
                            <div style="width: 30px; height: 30px; border-radius: 50%; border: 1px solid black;" class="d-flex justify-content-center align-items-center cursor-pointer"  data-toggle="modal" data-target="#courses">
                                <i class="fa fa-plus" style="color: black;"></i>
                            </div>
                        </div>
                    </div>

                    <!-- affiliate -->
                    <div class="bg-white w-100 mt-3 p-3" style="border-radius: 30px;">
                        <h3 class="text-center font-poppins-bold mb-3">Be Our Affiliate</h3>
                        <div class="w-100" style="border-radius: 10px; border: 1px solid lightgray;">
                            <h5 class="font-poppins-bold w-100 text-center p-3">Educate your friends about the event and earn flat affiliate commission of 30% in return.</h5>
                            <div class="mb-3 d-flex justify-content-center align-items-center w-100">
                                <button class="btn btn-primary font-poppins-bold" onclick="window.location = 'signup'">Register Now</button>
                            </div>
                            
                        </div>
                    </div>

                    <!-- get started with crypto -->
                    <div class="bg-white w-100 mt-3 p-3" style="border-radius: 30px;">
                        <h3 class="text-center font-poppins-bold mb-3">Get started with crypto</h3>
                        <div class="w-100" style="border-radius: 10px; border: 1px solid lightgray;">
                            <h5 class="font-poppins-bold w-100 text-center p-3">Create a free account now.</h5>
                            <div class="mb-3 d-flex justify-content-center align-items-center w-100">
                                <button class="btn btn-primary font-poppins-bold" rel="nofollow" onclick="window.open('https://wazirx.com/invite/sp7pvbt6','_blank')">Register Now</button>
                            </div>                            
                        </div>
                    </div>

                    <div class="bg-white w-100 mt-3 p-3" style="border-radius: 30px;">
                        <h3 class="text-center font-poppins-bold mb-3">Offers</h3>
                        <div class="w-100" style="border-radius: 10px; border: 1px solid lightgray;">
                            <p class="font-poppins-bold w-100 text-center p-3">For all people who were asking for coinshop the link is below. Feel free to register here, as you will be entitled for all the future offers and airdrops or anything their marketing team plans for their users.</p>
                            <div class="mb-3 d-flex justify-content-center align-items-center w-100">
                                <button class="btn btn-primary font-poppins-bold" rel="nofollow" onclick="window.open('https://www.gocoinshop.com/','_blank')">Register Now</button>
                            </div>                            
                        </div>
                    </div>

                    <!-- redeem your unlockables -->
                    <div class="bg-white w-100 mt-3 p-3 mb-5" style="border-radius: 30px;">
                        <h3 class="text-center font-poppins-bold mb-3">REDEEM YOUR UNLOCKABLES</h3>
                        <div class="w-100" style="border-radius: 10px; border: 1px solid lightgray;">
                            <div class="container-fluid">
                                <div class="row py-2">
                                    <div class="col-md-2 d-flex justify-content-center align-items-center">
                                        <img src="icons/telegramda.png" class="w-100">
                                    </div>
                                    <div class="col-md-7">
                                        <h4 class="font-poppins-bold">Member-Only Exclusive Telegram Group</h4>
                                        <p class="font-poppins-regular">A members-only exclusive Telegram Group (INR 10,000 value) to connect with India's top Investors & ask questions.</p>
                                    </div>
                                    <div class="col-md-3 pl-0 d-flex justify-content-center align-items-center">
                                        <div class="w-100 cursor-pointer" style="border-radius: 10px; background-color: #00ABC9; color: white; ">
                                            <h5 class="font-poppins-bold m-0 p-2 text-center" onclick="window.open('https://t.me/joinchat/TLrEKkoYgOaljlwSpuEZzQ','_blank');" >REDEEM<br>NOW</h5>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="w-100 mt-3" style="border-radius: 10px; border: 1px solid lightgray;">
                            <div class="container-fluid position-relative p-0">
                                <?php 
                                            
                                    if($new_batch == true){
                                        ?>
                                            <div class="w-100 h-100 position-absolute" style="background-color: black; opacity: 0.7; border-radius: 10px; z-index: 20;
                                            <?php
                                                if(strtotime($countDownDate12) - strtotime($currentDate) < 0){
                                                    echo "display: none !important; ";
                                                }
                                            ?>"></div>
                                                <div class="position-absolute w-100 h-100 d-flex justify-content-center align-items-center" style="z-index: 30;
                                                <?php
                                                    if(strtotime($countDownDate12) - strtotime($currentDate) < 0){
                                                        echo "display: none !important; ";
                                                    }
                                                ?>">
                                                    <div>
                                                        <h3 class="text-center text-white font-poppins-bold">UNLOCKS IN</h3>
                                                        <div class="wideCountdown clearfix cdLabelBold cdWhite cdLabelWhite cdStyleCircleLine wideCountdownSize1 is-countdown font-poppins-bold" data-date="03/26/2020" data-time="14" data-tz="india" data-url="#" data-lang="eng" data-color-time="rgb(255, 255, 255)" data-color-label="rgba(255, 255, 255, 0.3)" style="padding: 8px 0px;padding-left: 40px;font-size:9px;">
                                                            <span class="countdown-row countdown-show4">
                                                                <span class="countdown-section">
                                                                    <span class="days2 countdown-amount font-poppins-regular">11</span>
                                                                    <br>
                                                                    <span class="countdown-period font-poppins-regular">Days</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="hours2 countdown-amount font-poppins-regular">13</span><br>
                                                                    <span class="countdown-period font-poppins-regular">Hours</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="mins2 countdown-amount font-poppins-regular">56</span><br>
                                                                    <span class="countdown-period font-poppins-regular">Minutes</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="secs2 countdown-amount font-poppins-regular">19</span><br>
                                                                    <span class="countdown-period font-poppins-regular">Seconds</span>
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                        
                                        <?php 
                                        
                                    }
                                ?>
                                
                                <div class="row py-2 px-2">
                                    <div class="col-md-2 d-flex justify-content-center align-items-center">
                                        <img src="images/glossary-icon.png" class="w-100">
                                    </div>
                                    <div class="col-md-7">
                                        <h4 class="font-poppins-bold">Crypto Currency Glossary : List Of Common Crypto Terminologies</h4>
                                        <p class="font-poppins-regular">A glossary of Crypto Currency explaining all the basic terminologies.</p>
                                    </div>
                                    <div class="col-md-3 pl-0 d-flex justify-content-center align-items-center">
                                        <div class="w-100 cursor-pointer" style="border-radius: 10px; background-color: #00ABC9; color: white; ">
                                            <?php 
                                            
                                                if($new_batch == false){
                                                    ?>
                                                        <h5 class="font-poppins-bold m-0 p-2 text-center" onclick="window.open('https://cryptonite.finstreet.in/docs/Finstreet Crypto Glossary.pdf','_blank');" >REDEEM<br>NOW</h5>
                                                    <?php
                                                } else if($new_batch == true){
                                                    ?>
                                                        <h5 class="font-poppins-bold m-0 p-2 text-center" onclick="<?php
                                                            if(strtotime($countDownDate12) - strtotime($currentDate) < 0){
                                                                echo "window.open('https://cryptonite.finstreet.in/docs/Finstreet Crypto Glossary.pdf','_blank');";
                                                            }
                                                        ?>" >REDEEM<br>NOW</h5>
                                                        <!-- <h5 class="font-poppins-bold m-0 p-2 text-center" >REDEEM<br>NOW</h5> -->
                                                    
                                                    <?php 
                                                    
                                                }
                                            ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-100 mt-3" style="border-radius: 10px; border: 1px solid lightgray;">
                            <div class="container-fluid position-relative p-0">
                                <?php 
                                                
                                    if($new_batch == true){
                                        ?>
                                            <div class="w-100 h-100 position-absolute" style="background-color: black; opacity: 0.7; border-radius: 10px; z-index: 20;
                                            <?php
                                                if(strtotime($countDownDate13) - strtotime($currentDate) < 0){
                                                    echo "display: none !important;";
                                                }
                                            ?> 
                                            "></div>
                                                <div class="position-absolute w-100 h-100 d-flex justify-content-center align-items-center" style="z-index: 30; 
                                                <?php
                                                    if(strtotime($countDownDate13) - strtotime($currentDate) < 0){
                                                        echo "display: none !important;";
                                                    }
                                                ?> ">
                                                    <div>
                                                        <h3 class="text-center text-white font-poppins-bold">UNLOCKS IN</h3>
                                                        <div class="wideCountdown clearfix cdLabelBold cdWhite cdLabelWhite cdStyleCircleLine wideCountdownSize1 is-countdown font-poppins-bold" data-date="03/26/2020" data-time="14" data-tz="india" data-url="#" data-lang="eng" data-color-time="rgb(255, 255, 255)" data-color-label="rgba(255, 255, 255, 0.3)" style="padding: 8px 0px;padding-left: 40px;font-size:9px;">
                                                            <span class="countdown-row countdown-show4">
                                                                <span class="countdown-section">
                                                                    <span class="days2 countdown-amount font-poppins-regular">11</span>
                                                                    <br>
                                                                    <span class="countdown-period font-poppins-regular">Days</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="hours2 countdown-amount font-poppins-regular">13</span><br>
                                                                    <span class="countdown-period font-poppins-regular">Hours</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="mins2 countdown-amount font-poppins-regular">56</span><br>
                                                                    <span class="countdown-period font-poppins-regular">Minutes</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="secs2 countdown-amount font-poppins-regular">19</span><br>
                                                                    <span class="countdown-period font-poppins-regular">Seconds</span>
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                        
                                        <?php 
                                        
                                    }
                                ?>
                                <div class="row py-2 px-2">
                                    <div class="col-md-2 d-flex justify-content-center align-items-center">
                                        <img src="icons/present.png" class="w-100">
                                    </div>
                                    <div class="col-md-7">
                                        <h4 class="font-poppins-bold">Bonus Content, Cheat Sheets, and Mini-Courses</h4>
                                        <p class="font-poppins-regular">Many speakers will be sharing special bonus eBooks, Guides, Mini Courses (INR 5,000 value) as gift for you.</p>
                                    </div>
                                    <div class="col-md-3 pl-0 d-flex justify-content-center align-items-center">
                                        <div class="w-100 cursor-pointer" style="border-radius: 10px; background-color: #00ABC9; color: white; ">
                                            <?php 
                                            
                                                if($new_batch == false){
                                                    ?>
                                                        <h5 class="font-poppins-bold m-0 p-2 text-center" onclick="window.open('https://cryptonite.finstreet.in/docs/Crypto Cheat Sheets.pdf','_blank');" >REDEEM<br>NOW</h5>
                                                    <?php
                                                } else if($new_batch == true){
                                                    ?>
                                                        <h5 class="font-poppins-bold m-0 p-2 text-center" onclick="<?php
                                                            if(strtotime($countDownDate13) - strtotime($currentDate) < 0){
                                                                echo "window.open('https://cryptonite.finstreet.in/docs/Crypto Cheat Sheets.pdf','_blank');";
                                                            }
                                                        ?>" >REDEEM<br>NOW</h5>
                                                        <!-- <h5 class="font-poppins-bold m-0 p-2 text-center">REDEEM<br>NOW</h5> -->
                                                    
                                                    <?php 
                                                    
                                                }
                                            ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-100 mt-3" style="border-radius: 10px; border: 1px solid lightgray;">
                            <div class="container-fluid position-relative p-0">
                                <?php 
                                                    
                                    if($new_batch == true){
                                        ?>
                                            <div class="w-100 h-100 position-absolute" style="background-color: black; opacity: 0.7; border-radius: 10px; z-index: 20; 
                                            <?php
                                                if(strtotime($countDownDate14) - strtotime($currentDate) < 0){
                                                    echo "display: none !important;";
                                                }
                                            ?>"></div>
                                                <div class="position-absolute w-100 h-100 d-flex justify-content-center align-items-center" style="z-index: 30; 
                                                <?php
                                                    if(strtotime($countDownDate14) - strtotime($currentDate) < 0){
                                                        echo "display: none !important;";
                                                    }
                                                ?>">
                                                    <div>
                                                        <h3 class="text-center text-white font-poppins-bold">UNLOCKS IN</h3>
                                                        <div class="wideCountdown clearfix cdLabelBold cdWhite cdLabelWhite cdStyleCircleLine wideCountdownSize1 is-countdown font-poppins-bold" data-date="03/26/2020" data-time="14" data-tz="india" data-url="#" data-lang="eng" data-color-time="rgb(255, 255, 255)" data-color-label="rgba(255, 255, 255, 0.3)" style="padding: 8px 0px;padding-left: 40px;font-size:9px;">
                                                            <span class="countdown-row countdown-show4">
                                                                <span class="countdown-section">
                                                                    <span class="days2 countdown-amount font-poppins-regular">11</span>
                                                                    <br>
                                                                    <span class="countdown-period font-poppins-regular">Days</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="hours2 countdown-amount font-poppins-regular">13</span><br>
                                                                    <span class="countdown-period font-poppins-regular">Hours</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="mins2 countdown-amount font-poppins-regular">56</span><br>
                                                                    <span class="countdown-period font-poppins-regular">Minutes</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="secs2 countdown-amount font-poppins-regular">19</span><br>
                                                                    <span class="countdown-period font-poppins-regular">Seconds</span>
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                        
                                        <?php 
                                        
                                    }
                                ?>
                                
                                <div class="row py-2 px-2">
                                    <div class="col-md-2 d-flex justify-content-center align-items-center">
                                        <img src="icons/Notes.png" class="w-100">
                                    </div>
                                    <div class="col-md-7">
                                        <h4 class="font-poppins-bold">Life-Changing Case Studies, Tutorials and Blueprints shared by 28+ Experts and Influencers</h4>
                                        <p class="font-poppins-regular">These are like 30-day financial plans with proven and trusted finance secrets (INR 10,000 value) for anyone who wants to start or boost their online journey.</p>
                                    </div>
                                    <div class="col-md-3 pl-0 d-flex justify-content-center align-items-center">
                                        <div class="w-100 cursor-pointer" style="border-radius: 10px; background-color: #00ABC9; color: white; ">
                                            <?php 
                                            
                                                if($new_batch == false){
                                                    ?>
                                                        <h5 class="font-poppins-bold m-0 p-2 text-center" onclick="window.open('https://cryptonite.finstreet.in/docs/Venezuela hyper inflation case study.pdf','_blank');" >REDEEM<br>NOW</h5>
                                                    <?php
                                                } else if($new_batch == true){
                                                    ?>
                                                        <h5 class="font-poppins-bold m-0 p-2 text-center" onclick="<?php
                                                            if(strtotime($countDownDate14) - strtotime($currentDate) < 0){
                                                                echo "window.open('https://cryptonite.finstreet.in/docs/Venezuela hyper inflation case study.pdf','_blank');";
                                                            }
                                                        ?>" >REDEEM<br>NOW</h5>
                                                        <!-- <h5 class="font-poppins-bold m-0 p-2 text-center" >REDEEM<br>NOW</h5> -->
                                                    
                                                    <?php 
                                                    
                                                }
                                            ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-100 mt-3" style="border-radius: 10px; border: 1px solid lightgray;">
                            <div class="container-fluid position-relative p-0">
                                <?php 
                                                    
                                    if($new_batch == true){
                                        ?>
                                            <div class="w-100 h-100 position-absolute" style="background-color: black; opacity: 0.7; border-radius: 10px; z-index: 20;
                                            <?php
                                                if(strtotime($countDownDate15) - strtotime($currentDate) < 0){
                                                    echo "display: none !important; ";
                                                }
                                            ?>
                                            "></div>
                                                <div class="position-absolute w-100 h-100 d-flex justify-content-center align-items-center" style="z-index: 30;
                                                <?php
                                                    if(strtotime($countDownDate15) - strtotime($currentDate) < 0){
                                                        echo "display: none !important; ";
                                                    }
                                                ?>
                                                ">
                                                    <div>
                                                        <h3 class="text-center text-white font-poppins-bold">UNLOCKS IN</h3>
                                                        <div class="wideCountdown clearfix cdLabelBold cdWhite cdLabelWhite cdStyleCircleLine wideCountdownSize1 is-countdown font-poppins-bold" data-date="03/26/2020" data-time="14" data-tz="india" data-url="#" data-lang="eng" data-color-time="rgb(255, 255, 255)" data-color-label="rgba(255, 255, 255, 0.3)" style="padding: 8px 0px;padding-left: 40px;font-size:9px;">
                                                            <span class="countdown-row countdown-show4">
                                                                <span class="countdown-section">
                                                                    <span class="days2 countdown-amount font-poppins-regular">11</span>
                                                                    <br>
                                                                    <span class="countdown-period font-poppins-regular">Days</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="hours2 countdown-amount font-poppins-regular">13</span><br>
                                                                    <span class="countdown-period font-poppins-regular">Hours</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="mins2 countdown-amount font-poppins-regular">56</span><br>
                                                                    <span class="countdown-period font-poppins-regular">Minutes</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="secs2 countdown-amount font-poppins-regular">19</span><br>
                                                                    <span class="countdown-period font-poppins-regular">Seconds</span>
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                        
                                        <?php 
                                        
                                    }
                                ?>
                                <div class="row py-2 px-2">
                                    <div class="col-md-2 d-flex justify-content-center align-items-center">
                                        <img src="icons/decentralized-01-512.png" class="w-100">
                                    </div>
                                    <div class="col-md-7">
                                        <h4 class="font-poppins-bold">How to DeFi : A Guide to Decentralized Finance</h4>
                                        <p class="font-poppins-regular">E-Book explaining what is Decentralized Finance and what are the impacts that DeFi can bring in our lives. </p>
                                    </div>
                                    <div class="col-md-3 pl-0 d-flex justify-content-center align-items-center">
                                        <div class="w-100 cursor-pointer" style="border-radius: 10px; background-color: #00ABC9; color: white; ">
                                            <?php 
                                            
                                                if($new_batch == false){
                                                    ?>
                                                        <h5 class="font-poppins-bold m-0 p-2 text-center" onclick="window.open('https://cryptonite.finstreet.in/docs/Defi ebook.pdf','_blank');" >REDEEM<br>NOW</h5>
                                                    <?php
                                                } else if($new_batch == true){
                                                    ?>
                                                        

                                                        <h5 class="font-poppins-bold m-0 p-2 text-center" onclick="<?php
                                                            if(strtotime($countDownDate15) - strtotime($currentDate) < 0){
                                                                echo "window.open('https://cryptonite.finstreet.in/docs/Defi ebook.pdf','_blank');";
                                                            }
                                                        ?>"
                                                        
                                                        >REDEEM<br>NOW</h5>
                                                    
                                                    <?php 
                                                    
                                                }
                                            ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-100 mt-3" style="border-radius: 10px; border: 1px solid lightgray;">
                            <div class="container-fluid position-relative p-0 d-flex align-items-center" style="height: 150px">

                                <?php 
                                                    
                                    if($new_batch == true){
                                        ?>
                                            <div class="w-100 h-100 position-absolute" style="background-color: black; opacity: 0.7; border-radius: 10px; z-index: 20;
                                            <?php
                                                if(strtotime($countDownDate16) - strtotime($currentDate) < 0){
                                                    echo "display: none !important";
                                                }
                                            ?>"></div>
                                                <div class="position-absolute w-100 h-100 d-flex justify-content-center align-items-center" style="z-index: 30;
                                                <?php
                                                    if(strtotime($countDownDate16) - strtotime($currentDate) < 0){
                                                        echo "display: none !important";
                                                    }
                                                ?>">
                                                    <div>
                                                        <h3 class="text-center text-white font-poppins-bold">UNLOCKS IN</h3>
                                                        <div class="wideCountdown clearfix cdLabelBold cdWhite cdLabelWhite cdStyleCircleLine wideCountdownSize1 is-countdown font-poppins-bold" data-date="03/26/2020" data-time="14" data-tz="india" data-url="#" data-lang="eng" data-color-time="rgb(255, 255, 255)" data-color-label="rgba(255, 255, 255, 0.3)" style="padding: 8px 0px;padding-left: 40px;font-size:9px;">
                                                            <span class="countdown-row countdown-show4">
                                                                <span class="countdown-section">
                                                                    <span class="days2 countdown-amount font-poppins-regular">11</span>
                                                                    <br>
                                                                    <span class="countdown-period font-poppins-regular">Days</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="hours2 countdown-amount font-poppins-regular">13</span><br>
                                                                    <span class="countdown-period font-poppins-regular">Hours</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="mins2 countdown-amount font-poppins-regular">56</span><br>
                                                                    <span class="countdown-period font-poppins-regular">Minutes</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="secs2 countdown-amount font-poppins-regular">19</span><br>
                                                                    <span class="countdown-period font-poppins-regular">Seconds</span>
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                        
                                        <?php 
                                        
                                    }
                                ?>
                                <div class="row py-2 px-2">
                                    <div class="col-md-2 d-flex justify-content-center align-items-center">
                                        <img src="icons/certificate.png" class="w-100">
                                    </div>
                                    <div class="col-md-7 d-flex align-items-center">
                                        <h4 class="font-poppins-bold">Certificate of Participation</h4>
                                        
                                    </div>
                                    <div class="col-md-3 pl-0 d-flex justify-content-center align-items-center">
                                        <div class="w-100 cursor-pointer" style="border-radius: 10px; background-color: #00ABC9; color: white; ">
                                            <?php 
                                            
                                                if($new_batch == false){
                                                    ?>
                                                        <h5 class="font-poppins-bold m-0 p-2 text-center" onclick="certificate()" >REDEEM<br>NOW</h5>
                                                    <?php
                                                } else if($new_batch == true){
                                                    ?>
                                                        <h5 class="font-poppins-bold m-0 p-2 text-center" onclick="<?php
                                                            if(strtotime($countDownDate16) - strtotime($currentDate) < 0){
                                                                echo "certificate()";
                                                            }
                                                        ?>" >REDEEM<br>NOW</h5>
                                                    <?php 
                                                    
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-100 mt-3" style="border-radius: 10px; border: 1px solid lightgray;">
                            <div class="container-fluid position-relative p-0 d-flex align-items-center" style="height: 150px">

                                <?php 
                                                    
                                    if($new_batch == true || $new_batch == false){
                                        ?>
                                            <div class="w-100 h-100 position-absolute" style="background-color: black; opacity: 0.7; border-radius: 10px; z-index: 20;"></div>
                                                <div class="position-absolute w-100 h-100 d-flex justify-content-center align-items-center" style="z-index: 30;">
                                                    <div>
                                                        <h3 class="text-center text-white font-poppins-bold">UNLOCKS IN</h3>
                                                        <div class="wideCountdown clearfix cdLabelBold cdWhite cdLabelWhite cdStyleCircleLine wideCountdownSize1 is-countdown font-poppins-bold" data-date="03/26/2020" data-time="14" data-tz="india" data-url="#" data-lang="eng" data-color-time="rgb(255, 255, 255)" data-color-label="rgba(255, 255, 255, 0.3)" style="padding: 8px 0px;padding-left: 40px;font-size:9px;">
                                                            <span class="countdown-row countdown-show4">
                                                                <span class="countdown-section">
                                                                    <span class="days3 countdown-amount font-poppins-regular">11</span>
                                                                    <br>
                                                                    <span class="countdown-period font-poppins-regular">Days</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="hours3 countdown-amount font-poppins-regular">13</span><br>
                                                                    <span class="countdown-period font-poppins-regular">Hours</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="mins3 countdown-amount font-poppins-regular">56</span><br>
                                                                    <span class="countdown-period font-poppins-regular">Minutes</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="secs3 countdown-amount font-poppins-regular">19</span><br>
                                                                    <span class="countdown-period font-poppins-regular">Seconds</span>
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                        
                                        <?php 
                                        
                                    }
                                ?>
                                <div class="row py-2 px-2">
                                    <div class="col-md-2 d-flex justify-content-center align-items-center">
                                        <img src="icons/blockchain-43-914983.png" class="w-100">
                                    </div>
                                    <div class="col-md-7 d-flex align-items-center">
                                        <h4 class="font-poppins-bold">Certificate on Blockchain</h4>
                                        
                                    </div>
                                    <div class="col-md-3 pl-0 d-flex justify-content-center align-items-center">
                                        <div class="w-100 cursor-pointer" style="border-radius: 10px; background-color: #00ABC9; color: white; ">
                                            <?php 
                                            
                                                if($new_batch == false){
                                                    ?>
                                                        <!-- <h5 class="font-poppins-bold m-0 p-2 text-center" onclick="certificate()" >REDEEM<br>NOW</h5> -->
                                                        <h5 class="font-poppins-bold m-0 p-2 text-center" >REDEEM<br>NOW</h5>
                                                    <?php
                                                } else if($new_batch == true){
                                                    ?>
                                                        <h5 class="font-poppins-bold m-0 p-2 text-center" >REDEEM<br>NOW</h5>
                                                    <?php 
                                                    
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        
                        
                        
                    </div>
                </div>
            </div>

        
        </div>

        <!-- Modal -->
        <div class="modal fade" id="courses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Courses for You</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        No New Courses are available for you right now. Please check back later.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="event-popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Events for You</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        No New Events are available for you right now. Please check back later.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        

        
        
    </div>

    <div class="d-lg-none">
        <!-- Navigation -->
        <div class="fixed-top" style="padding:80px 0px;background-color:#00abc9;outline:none;">
            <header>
                <div class="position-fixed h-100 w-100" style="opacity:1;backdrop-filter:blur(8px); -webkit-backdrop-filter:blur(8px);z-index:16;display:none;top:0px" id="drawer">
                    <div class="container h-100 w-100 pr-0">
                        <div class="row h-100 w-100 mr-0 position-absolute">
                            <div class="col-2 d-flex justify-content-end pt-5 pl-0" id="cross" style="padding-right:20px !important;">
                                <div id="mobile-cross">
                                    <p class="m-0" style="font-size:50px;color:#fff;">X</p>
                                </div>
                            </div>
                            <div class="col-10 position-relative" style="background: #00abc9 0% 0% no-repeat padding-box;">
                                <div class="position-absolute w-100" style="top:10%;">
                                    
                                    <p class="footer-text font-weight-light text-center" style="font-size:50px;margin-bottom:10px; font-family: europhonic;color:#fff;" onclick="window.location = 'user-login'">Logout</p>
                                </div>                          
                            </div>                        
                        </div>                
                    </div>                
                </div>        
                <div class="nav-container">
                    <div id="mobile-navbar"></div>
                    <div style="position: fixed; z-index: 10; right:70px; margin-top:-38px; z-index:15 !important;" id="open-drawer">
                        <hr style="width: 50px;height: 4px;background-color: white;margin-top: 10px;margin-bottom: 0px;border-radius: 100px;">
                        <hr style="width: 50px;height: 4px;background-color: white;margin-top: 15px;margin-bottom: 0px;border-radius: 100px;">
                        <hr style="width: 50px;height: 4px;background-color: white;margin-top: 15px;margin-bottom: 0px;border-radius: 100px;">
                    </div>
                    <div class="d-flex position-fixed align-items-center w-100" style="z-index: 10; margin-top:-45px; margin-left:32px;">
                        <a class="navbar-brand header-text" id="mobile-header-logo-text" href="/">
                            <img class="logo-header" src="images/logo.png" alt="" style="width:250px;">
                        </a>
                    </div>
                </div>            
            </header>
        </div>

        <!-- pop for event click -->
        <div id="event-pop-mobile" class="position-fixed w-100 h-100 justify-content-center align-items-center" style="z-index: 100; background-color: #00ABC9; display: none;" >
            <div class="w-100 p-5">
                <h2 class="font-poppins-bold text-white" style="font-size: 3rem;">EVENT STARTS IN</h2>
                <h2 class="font-poppins-bold text-white" style="font-size: 3rem;"><span class="days1">23</span> DAYS <span class="hours1">5</span> HOURS <span class="mins1">8</span> MINUTES <span class="secs1">2</span> SECONDS</h2>
                <p class="text-center text-white cursor-pointer mt-4" style="text-decoration: underline; opacity: 0.9; font-size: 2rem;" id="go-back-mobile"> Go Back</p>
            </div>
        </div>
        <!-- page content -->
        <div class="container-fluid" style="padding-top: 250px; background-color: #00ABC9;"> 
            <div class="w-100 d-flex justify-content-center align-items-center">
                <div class="w-100 p-3">
                    <h1 class="text-white text-center text-uppercase font-poppins-bold" style="font-size: 4rem;">Welcome <span class="name"><?php echo $name; ?></span></h1>
                    <!-- events -->
                    <div class="bg-white w-100 mt-3 p-3" style="border-radius: 30px;">
                        <h3 class="text-center font-poppins-bold mb-3" style="font-size: 3rem;">YOUR EVENTS</h3>
                        <div class="w-100" style="border-radius: 10px; border: 2px solid lightgray;">
                            <div class="container-fluid">
                                <div class="row p-2">
                                    <div class="col-md-5 pl-0">
                                        <img src="images/image.jpg" class="w-100" style="border-radius: 10px;">
                                    </div>
                                    <div class="col-md-7 pr-0">
                                        <h4 class="font-poppins-bold w-100" style="font-size: 3rem;">CRYPTO-NITE 2020</h4>
                                        

                                        <?php 
                                        
                                            if($new_batch == false){
                                                ?>
                                                    <button class="mt-2 btn btn-primary font-poppins-bold" style="font-size: 2rem;" onclick="window.location = 'cryptonite?day=1'" >Watch Videos >></button>
                                                <?php
                                            } else if($new_batch == true){
                                                ?>
                                                    <p class="font-poppins-regular mb-0" style="font-size: 1.5rem;">Start Date : <?php echo date_format(date_create($eventDay1), "d/m/Y");?></p>
                                                    <p class="font-poppins-regular mb-0" style="font-size: 1.5rem;">End Date : <?php echo date_format(date_create($eventDay3), "d/m/Y");?></p>

                                                    <?php
                                                        if(strtotime($eventDay3) - strtotime($currentDate) < 0){
                                                            ?>
                                                                <button class="mt-2 btn btn-primary font-poppins-bold" style="font-size: 2rem;" onclick="window.location = 'cryptonite?day=3'" >Go To Event >></button>
                                                            <?php
                                                        }else if(strtotime($eventDay2) - strtotime($currentDate) < 0){
                                                            ?>
                                                                <button class="mt-2 btn btn-primary font-poppins-bold" style="font-size: 2rem;" onclick="window.location = 'cryptonite?day=2'" >Go To Event >></button>
                                                            <?php
                                                        } else if(strtotime($eventDay1) - strtotime($currentDate) < 0){
                                                            ?>
                                                                <button class="mt-2 btn btn-primary font-poppins-bold" style="font-size: 2rem;" onclick="window.location = 'cryptonite?day=1'" >Go To Event >></button>
                                                            <?php
                                                        }else {
                                                            ?>
                                                                <button class="mt-2 btn btn-primary font-poppins-bold" style="font-size: 2rem;" id="event-mobile" >Go To Event >></button>
                                                            <?php
                                                        }   
                                                    ?>
                                                    
                                                
                                                <?php 
                                                
                                            }
                                        ?>
                                        

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 d-flex justify-content-center align-items-center w-100">
                            <div style="width: 50px; height: 50px; border-radius: 50%; border: 2px solid black;" class="d-flex justify-content-center align-items-center cursor-pointer"  data-toggle="modal" data-target="#event-popup-mobile">
                                <i class="fa fa-plus" style="color: black; font-size: 2rem;" ></i>
                            </div>
                        </div>
                    </div>
                    <!-- your courses -->
                    <div class="bg-white w-100 mt-3 p-3" style="border-radius: 30px;">
                        <h3 class="text-center font-poppins-bold mb-3" style="font-size: 3rem;">YOUR COURSES</h3>
                        <div class="w-100" style="border-radius: 10px; border: 2px solid lightgray;">
                            <h5 class="font-poppins-bold w-100 text-center p-3" style="font-size: 2rem;">You Haven't Subscribed to a course yet</h5>
                        </div>
                        <div class="mt-3 d-flex justify-content-center align-items-center w-100">
                            <div style="width: 50px; height: 50px; border-radius: 50%; border: 2px solid black;" class="d-flex justify-content-center align-items-center cursor-pointer"  data-toggle="modal" data-target="#courses-mobile">
                                <i class="fa fa-plus" style="color: black; font-size: 2rem;"></i>
                            </div>
                        </div>
                        
                        
                    </div>

                    <!-- affiliate -->
                    <div class="bg-white w-100 mt-3 p-3" style="border-radius: 30px;">
                        <h3 class="text-center font-poppins-bold mb-3" style="font-size: 3rem;">Be Our Affiliate</h3>
                        <div class="w-100" style="border-radius: 10px; border: 1px solid lightgray;">
                            <h5 class="font-poppins-bold w-100 text-center p-3" style="font-size: 2rem;">Educate your friends about the event and earn flat affiliate commission of 30% in return.</h5>
                            <div class="mb-3 d-flex justify-content-center align-items-center w-100">
                                <button class="btn btn-primary font-poppins-bold" onclick="window.location = 'signup'" style="font-size: 2rem;">Register Now</button>
                            </div>
                            
                        </div>
                    </div>

                    <!-- affiliate -->
                    <div class="bg-white w-100 mt-3 p-3" style="border-radius: 30px;">
                        <h3 class="text-center font-poppins-bold mb-3" style="font-size: 3rem;">Get started with crypto</h3>
                        <div class="w-100" style="border-radius: 10px; border: 1px solid lightgray;">
                            <h5 class="font-poppins-bold w-100 text-center p-3" style="font-size: 2rem;">Create a free account now.</h5>
                            <div class="mb-3 d-flex justify-content-center align-items-center w-100">
                                <button class="btn btn-primary font-poppins-bold"rel="nofollow" onclick="window.open('https://wazirx.com/invite/sp7pvbt6','_blank')" style="font-size: 2rem;">Register Now</button>
                            </div>
                            
                        </div>
                    </div>

                    <div class="bg-white w-100 mt-3 p-3" style="border-radius: 30px;">
                        <h3 class="text-center font-poppins-bold mb-3" style="font-size: 3rem;">Offers</h3>
                        <div class="w-100" style="border-radius: 10px; border: 1px solid lightgray;">
                            <p class="font-poppins-regular w-100 text-center p-3" style="font-size: 2rem;">For all people who were asking for coinshop the link is below. Feel free to register here, as you will be entitled for all the future offers and airdrops or anything their marketing team plans for their users.</p>
                            <div class="mb-3 d-flex justify-content-center align-items-center w-100">
                                <button class="btn btn-primary font-poppins-bold"rel="nofollow" onclick="window.open('https://www.gocoinshop.com/','_blank')" style="font-size: 2rem;">Register Now</button>
                            </div>
                            
                        </div>
                    </div>

                    <!-- redeem your unlockables -->
                    <div class="bg-white w-100 mt-3 p-3 mb-5" style="border-radius: 30px;">
                        <h3 class="text-center font-poppins-bold mb-3" style="font-size: 3rem;">REDEEM YOUR UNLOCKABLES</h3>
                        <div class="w-100" style="border-radius: 10px; border: 2px solid lightgray;">
                            <div class="container-fluid">
                                <div class="row py-2">
                                    <div class="col-md-2 d-flex justify-content-center align-items-center">
                                        <img src="icons/telegramda.png" class="w-100">
                                    </div>
                                    <div class="col-md-7">
                                        <h4 class="font-poppins-bold" style="font-size: 2rem;">Member-Only Exclusive Teegram Group</h4>
                                        <p class="font-poppins-regular" style="font-size: 1.5rem;">A members-only exclusive Telegram Group (INR 10,000 value) to connect with India's top Investors & ask questions.</p>
                                    </div>
                                    <div class="col-md-3 pl-0 d-flex justify-content-center align-items-center">
                                        <div class="w-100 cursor-pointer" style="border-radius: 10px; background-color: #00ABC9; color: white; ">
                                            <h5 class="font-poppins-bold m-0 p-2 text-center" onclick="window.open('https://t.me/joinchat/TLrEKkoYgOaljlwSpuEZzQ','_blank');" style="font-size: 2rem;">REDEEM<br>NOW</h5>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="w-100 mt-3" style="border-radius: 10px; border: 2px solid lightgray;">
                            <div class="container-fluid position-relative p-0">
                                <?php 
                                            
                                    if($new_batch == true){
                                        ?>
                                            <div class="w-100 h-100 position-absolute" style="background-color: black; opacity: 0.7; border-radius: 10px; z-index: 20;
                                            <?php
                                                if(strtotime($countDownDate12) - strtotime($currentDate) < 0){
                                                    echo "display: none !important;";
                                                }
                                            ?>"></div>
                                                <div class="position-absolute w-100 h-100 d-flex justify-content-center align-items-center" style="z-index: 30;
                                                <?php
                                                    if(strtotime($countDownDate12) - strtotime($currentDate) < 0){
                                                        echo "display: none !important;";
                                                    }
                                                ?>">
                                                    <div>
                                                        <h3 class="text-center text-white font-poppins-bold" style="font-size: 2.5rem;">UNLOCKS IN</h3>
                                                        <div class="wideCountdown clearfix cdLabelBold cdWhite cdLabelWhite cdStyleCircleLine wideCountdownSize1 is-countdown font-poppins-bold" data-date="03/26/2020" data-time="14" data-tz="india" data-url="#" data-lang="eng" data-color-time="rgb(255, 255, 255)" data-color-label="rgba(255, 255, 255, 0.3)" style="padding: 8px 0px;padding-left: 40px;font-size:9px;">
                                                            <span class="countdown-row countdown-show4">
                                                                <span class="countdown-section">
                                                                    <span class="days2 countdown-amount font-poppins-regular" style="font-size: 1.5rem;">11</span>
                                                                    <br>
                                                                    <span class="countdown-period font-poppins-regular" style="font-size: 1.5rem;">Days</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="hours2 countdown-amount font-poppins-regular" style="font-size: 1.5rem;">13</span><br>
                                                                    <span class="countdown-period font-poppins-regular" style="font-size: 1.5rem;">Hours</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="mins2 countdown-amount font-poppins-regular" style="font-size: 1.5rem;">56</span><br>
                                                                    <span class="countdown-period font-poppins-regular" style="font-size: 1.5rem;">Minutes</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="secs2 countdown-amount font-poppins-regular" style="font-size: 1.5rem;">19</span><br>
                                                                    <span class="countdown-period font-poppins-regular" style="font-size: 1.5rem;">Seconds</span>
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                        
                                        <?php 
                                        
                                    }
                                ?>
                                
                                <div class="row py-2 px-2">
                                    <div class="col-md-2 d-flex justify-content-center align-items-center">
                                        <img src="images/glossary-icon.png" class="w-100">
                                    </div>
                                    <div class="col-md-7">
                                        <h4 class="font-poppins-bold" style="font-size: 2rem;">Crypto Currency Glossary : List Of Common Crypto Terminologies</h4>
                                        <p class="font-poppins-regular" style="font-size: 1.5rem;">A glossary of Crypto Currency explaining all the basic terminologies.</p>
                                    </div>
                                    <div class="col-md-3 pl-0 d-flex justify-content-center align-items-center">
                                        <div class="w-100 cursor-pointer" style="border-radius: 10px; background-color: #00ABC9; color: white; ">
                                            <?php 
                                            
                                                if($new_batch == false){
                                                    ?>
                                                        <h5 class="font-poppins-bold m-0 p-2 text-center" onclick="window.open('https://cryptonite.finstreet.in/docs/Finstreet Crypto Glossary.pdf','_blank');" style="font-size: 2rem;">REDEEM<br>NOW</h5>
                                                    <?php
                                                } else if($new_batch == true){
                                                    ?>
                                                        <h5 class="font-poppins-bold m-0 p-2 text-center" onclick="<?php
                                                            if(strtotime($countDownDate12) - strtotime($currentDate) < 0){
                                                                echo "window.open('https://cryptonite.finstreet.in/docs/Finstreet Crypto Glossary.pdf','_blank');";
                                                            }
                                                        ?>" style="font-size: 2rem;">REDEEM<br>NOW</h5>
                                                        <!-- <h5 class="font-poppins-bold m-0 p-2 text-center" style="font-size: 2rem;">REDEEM<br>NOW</h5> -->
                                                    
                                                    <?php 
                                                    
                                                }
                                            ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-100 mt-3" style="border-radius: 10px; border: 2px solid lightgray;">
                            <div class="container-fluid position-relative p-0">
                                <?php 
                                                
                                    if($new_batch == true){
                                        ?>
                                            <div class="w-100 h-100 position-absolute" style="background-color: black; opacity: 0.7; border-radius: 10px; z-index: 20; 
                                            <?php
                                                if(strtotime($countDownDate13) - strtotime($currentDate) < 0){
                                                    echo "display: none !important;";
                                                }
                                            ?>"></div>
                                                <div class="position-absolute w-100 h-100 d-flex justify-content-center align-items-center" style="z-index: 30; 
                                                <?php
                                                    if(strtotime($countDownDate13) - strtotime($currentDate) < 0){
                                                        echo "display: none !important;";
                                                    }
                                                ?>">
                                                    <div>
                                                        <h3 class="text-center text-white font-poppins-bold" style="font-size: 2.5rem;">UNLOCKS IN</h3>
                                                        <div class="wideCountdown clearfix cdLabelBold cdWhite cdLabelWhite cdStyleCircleLine wideCountdownSize1 is-countdown font-poppins-bold" data-date="03/26/2020" data-time="14" data-tz="india" data-url="#" data-lang="eng" data-color-time="rgb(255, 255, 255)" data-color-label="rgba(255, 255, 255, 0.3)" style="padding: 8px 0px;padding-left: 40px;font-size:9px;">
                                                            <span class="countdown-row countdown-show4">
                                                                <span class="countdown-section">
                                                                    <span class="days2 countdown-amount font-poppins-regular" style="font-size: 1.5rem;">11</span>
                                                                    <br>
                                                                    <span class="countdown-period font-poppins-regular" style="font-size: 1.5rem;">Days</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="hours2 countdown-amount font-poppins-regular" style="font-size: 1.5rem;">13</span><br>
                                                                    <span class="countdown-period font-poppins-regular" style="font-size: 1.5rem;">Hours</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="mins2 countdown-amount font-poppins-regular" style="font-size: 1.5rem;">56</span><br>
                                                                    <span class="countdown-period font-poppins-regular" style="font-size: 1.5rem;">Minutes</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="secs2 countdown-amount font-poppins-regular" style="font-size: 1.5rem;">19</span><br>
                                                                    <span class="countdown-period font-poppins-regular" style="font-size: 1.5rem;">Seconds</span>
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                        
                                        <?php 
                                        
                                    }
                                ?>
                                <div class="row py-2 px-2">
                                    <div class="col-md-2 d-flex justify-content-center align-items-center">
                                        <img src="icons/present.png" class="w-100">
                                    </div>
                                    <div class="col-md-7">
                                        <h4 class="font-poppins-bold" style="font-size: 2rem;">Bonus Content, Cheat Sheets, and Mini-Courses</h4>
                                        <p class="font-poppins-regular" style="font-size: 1.5rem;">Many speakers will be sharing special bonus eBooks, Guides, Mini Courses (INR 5,000 value) as gift for you.</p>
                                    </div>
                                    <div class="col-md-3 pl-0 d-flex justify-content-center align-items-center">
                                        <div class="w-100 cursor-pointer" style="border-radius: 10px; background-color: #00ABC9; color: white; ">
                                            <?php 
                                            
                                                if($new_batch == false){
                                                    ?>
                                                        <h5 class="font-poppins-bold m-0 p-2 text-center" onclick="window.open('https://cryptonite.finstreet.in/docs/Crypto Cheat Sheets.pdf','_blank');" style="font-size: 2rem;" >REDEEM<br>NOW</h5>
                                                    <?php
                                                } else if($new_batch == true){
                                                    ?>
                                                        <h5 class="font-poppins-bold m-0 p-2 text-center" onclick="<?php
                                                            if(strtotime($countDownDate13) - strtotime($currentDate) < 0){
                                                                echo "window.open('https://cryptonite.finstreet.in/docs/Crypto Cheat Sheets.pdf','_blank');";
                                                            }
                                                        ?>" style="font-size: 2rem;" >REDEEM<br>NOW</h5>
                                                        <!-- <h5 class="font-poppins-bold m-0 p-2 text-center" style="font-size: 2rem;" >REDEEM<br>NOW</h5> -->
                                                    
                                                    <?php 
                                                    
                                                }
                                            ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-100 mt-3" style="border-radius: 10px; border: 1px solid lightgray;">
                            <div class="container-fluid position-relative p-0">
                                <?php 
                                                
                                    if($new_batch == true){
                                        ?>
                                            <div class="w-100 h-100 position-absolute" style="background-color: black; opacity: 0.7; border-radius: 10px; z-index: 20;
                                            <?php
                                                if(strtotime($countDownDate14) - strtotime($currentDate) < 0){
                                                    echo "display: none !important;";
                                                }
                                            ?>"></div>
                                                <div class="position-absolute w-100 h-100 d-flex justify-content-center align-items-center" style="z-index: 30; 
                                                <?php
                                                    if(strtotime($countDownDate14) - strtotime($currentDate) < 0){
                                                        echo "display: none !important;";
                                                    }
                                                ?>">
                                                    <div>
                                                        <h3 class="text-center text-white font-poppins-bold" style="font-size: 2.5rem;">UNLOCKS IN</h3>
                                                        <div class="wideCountdown clearfix cdLabelBold cdWhite cdLabelWhite cdStyleCircleLine wideCountdownSize1 is-countdown font-poppins-bold" data-date="03/26/2020" data-time="14" data-tz="india" data-url="#" data-lang="eng" data-color-time="rgb(255, 255, 255)" data-color-label="rgba(255, 255, 255, 0.3)" style="padding: 8px 0px;padding-left: 40px;font-size:9px;">
                                                            <span class="countdown-row countdown-show4">
                                                                <span class="countdown-section">
                                                                    <span class="days2 countdown-amount font-poppins-regular" style="font-size: 1.5rem;">11</span>
                                                                    <br>
                                                                    <span class="countdown-period font-poppins-regular" style="font-size: 1.5rem;">Days</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="hours2 countdown-amount font-poppins-regular" style="font-size: 1.5rem;">13</span><br>
                                                                    <span class="countdown-period font-poppins-regular" style="font-size: 1.5rem;">Hours</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="mins2 countdown-amount font-poppins-regular" style="font-size: 1.5rem;">56</span><br>
                                                                    <span class="countdown-period font-poppins-regular" style="font-size: 1.5rem;">Minutes</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="secs2 countdown-amount font-poppins-regular" style="font-size: 1.5rem;">19</span><br>
                                                                    <span class="countdown-period font-poppins-regular" style="font-size: 1.5rem;">Seconds</span>
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                        
                                        <?php 
                                        
                                    }
                                ?>
                                
                                <div class="row py-2 px-2">
                                    <div class="col-md-2 d-flex justify-content-center align-items-center">
                                        <img src="icons/Notes.png" class="w-100">
                                    </div>
                                    <div class="col-md-7">
                                        <h4 class="font-poppins-bold" style="font-size: 2rem;">Life-Changing Case Studies, Tutorials and Blueprints shared by 28+ Experts and Influencers</h4>
                                        <p class="font-poppins-regular" style="font-size: 1.5rem;">These are like 30-day financial plans with proven and trusted finance secrets (INR 10,000 value) for anyone who wants to start or boost their online journey.</p>
                                    </div>
                                    <div class="col-md-3 pl-0 d-flex justify-content-center align-items-center">
                                        <div class="w-100 cursor-pointer" style="border-radius: 10px; background-color: #00ABC9; color: white; ">
                                            <?php 
                                            
                                                if($new_batch == false){
                                                    ?>
                                                        <h5 class="font-poppins-bold m-0 p-2 text-center" onclick="window.open('https://cryptonite.finstreet.in/docs/Venezuela hyper inflation case study.pdf','_blank');"  style="font-size: 2rem;">REDEEM<br>NOW</h5>
                                                    <?php
                                                } else if($new_batch == true){
                                                    ?>
                                                        <h5 class="font-poppins-bold m-0 p-2 text-center" onclick="<?php
                                                            if(strtotime($countDownDate14) - strtotime($currentDate) < 0){
                                                                echo "window.open('https://cryptonite.finstreet.in/docs/Venezuela hyper inflation case study.pdf','_blank');";
                                                            }
                                                        ?>"  style="font-size: 2rem;">REDEEM<br>NOW</h5>
                                                        <!-- <h5 class="font-poppins-bold m-0 p-2 text-center"   style="font-size: 2rem;">REDEEM<br>NOW</h5> -->
                                                    
                                                    <?php 
                                                    
                                                }
                                            ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-100 mt-3" style="border-radius: 10px; border: 1px solid lightgray;">
                            <div class="container-fluid position-relative p-0">
                                <?php 
                                                
                                    if($new_batch == true){
                                        ?>
                                            <div class="w-100 h-100 position-absolute" style="background-color: black; opacity: 0.7; border-radius: 10px; z-index: 20;
                                            <?php
                                                if(strtotime($countDownDate15) - strtotime($currentDate) < 0){
                                                    echo "display : none !important";
                                                }
                                            ?>"></div>
                                                <div class="position-absolute w-100 h-100 d-flex justify-content-center align-items-center" style="z-index: 30;
                                                <?php
                                                    if(strtotime($countDownDate15) - strtotime($currentDate) < 0){
                                                        echo "display : none !important";
                                                    }
                                                ?>">
                                                    <div>
                                                        <h3 class="text-center text-white font-poppins-bold" style="font-size: 2.5rem;">UNLOCKS IN</h3>
                                                        <div class="wideCountdown clearfix cdLabelBold cdWhite cdLabelWhite cdStyleCircleLine wideCountdownSize1 is-countdown font-poppins-bold" data-date="03/26/2020" data-time="14" data-tz="india" data-url="#" data-lang="eng" data-color-time="rgb(255, 255, 255)" data-color-label="rgba(255, 255, 255, 0.3)" style="padding: 8px 0px;padding-left: 40px;font-size:9px;">
                                                            <span class="countdown-row countdown-show4">
                                                                <span class="countdown-section">
                                                                    <span class="days2 countdown-amount font-poppins-regular" style="font-size: 1.5rem;">11</span>
                                                                    <br>
                                                                    <span class="countdown-period font-poppins-regular" style="font-size: 1.5rem;">Days</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="hours2 countdown-amount font-poppins-regular" style="font-size: 1.5rem;">13</span><br>
                                                                    <span class="countdown-period font-poppins-regular" style="font-size: 1.5rem;">Hours</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="mins2 countdown-amount font-poppins-regular" style="font-size: 1.5rem;">56</span><br>
                                                                    <span class="countdown-period font-poppins-regular" style="font-size: 1.5rem;">Minutes</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="secs2 countdown-amount font-poppins-regular" style="font-size: 1.5rem;">19</span><br>
                                                                    <span class="countdown-period font-poppins-regular" style="font-size: 1.5rem;">Seconds</span>
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                        
                                        <?php 
                                        
                                    }
                                ?>
                                
                                <div class="row py-2 px-2">
                                    <div class="col-md-2 d-flex justify-content-center align-items-center">
                                        <img src="icons/decentralized-01-512.png" class="w-100">
                                    </div>
                                    <div class="col-md-7">
                                        <h4 class="font-poppins-bold" style="font-size: 2rem;">How to DeFi : A Guide to Decentralized Finance</h4>
                                        <p class="font-poppins-regular" style="font-size: 1.5rem;">E-Book explaining what is Decentralized Finance and what are the impacts that DeFi can bring in our lives. </p>
                                    </div>
                                    <div class="col-md-3 pl-0 d-flex justify-content-center align-items-center">
                                        <div class="w-100 cursor-pointer" style="border-radius: 10px; background-color: #00ABC9; color: white; ">
                                            <?php 
                                            
                                                if($new_batch == false){
                                                    ?>
                                                        <h5 class="font-poppins-bold m-0 p-2 text-center" onclick="window.open('https://cryptonite.finstreet.in/docs/Defi ebook.pdf','_blank');"  style="font-size: 2rem;">REDEEM<br>NOW</h5>
                                                    <?php
                                                } else if($new_batch == true){
                                                    ?>
                                                        <h5 class="font-poppins-bold m-0 p-2 text-center" onclick="<?php
                                                            if(strtotime($countDownDate15) - strtotime($currentDate) < 0){
                                                                echo "window.open('https://cryptonite.finstreet.in/docs/Defi ebook.pdf','_blank');";
                                                            }
                                                        ?>" style="font-size: 2rem;">REDEEM<br>NOW</h5>
                                                    
                                                    <?php 
                                                    
                                                }
                                            ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-100 mt-3" style="border-radius: 10px; border: 1px solid lightgray;">
                            <div class="container-fluid position-relative p-0 d-flex align-items-center" style="height: 200px">
                                <?php 
                                            
                                    if($new_batch == true){
                                        ?>
                                            <div class="w-100 h-100 position-absolute" style="background-color: black; opacity: 0.7; border-radius: 10px; z-index: 20;
                                            <?php
                                                if(strtotime($countDownDate16) - strtotime($currentDate) < 0){
                                                    echo "display : none !important;";
                                                }
                                            ?>"></div>
                                                <div class="position-absolute w-100 h-100 d-flex justify-content-center align-items-center" style="z-index: 30;
                                                <?php
                                                    if(strtotime($countDownDate16) - strtotime($currentDate) < 0){
                                                        echo "display : none !important;";
                                                    }
                                                ?>">
                                                    <div>
                                                        <h3 class="text-center text-white font-poppins-bold" style="font-size: 2.5rem;">UNLOCKS IN</h3>
                                                        <div class="wideCountdown clearfix cdLabelBold cdWhite cdLabelWhite cdStyleCircleLine wideCountdownSize1 is-countdown font-poppins-bold" data-date="03/26/2020" data-time="14" data-tz="india" data-url="#" data-lang="eng" data-color-time="rgb(255, 255, 255)" data-color-label="rgba(255, 255, 255, 0.3)" style="padding: 8px 0px;padding-left: 40px;font-size:9px;">
                                                            <span class="countdown-row countdown-show4">
                                                                <span class="countdown-section">
                                                                    <span class="days2 countdown-amount font-poppins-regular" style="font-size: 1.5rem;">11</span>
                                                                    <br>
                                                                    <span class="countdown-period font-poppins-regular" style="font-size: 1.5rem;">Days</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="hours2 countdown-amount font-poppins-regular" style="font-size: 1.5rem;">13</span><br>
                                                                    <span class="countdown-period font-poppins-regular" style="font-size: 1.5rem;">Hours</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="mins2 countdown-amount font-poppins-regular" style="font-size: 1.5rem;">56</span><br>
                                                                    <span class="countdown-period font-poppins-regular" style="font-size: 1.5rem;">Minutes</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="secs2 countdown-amount font-poppins-regular" style="font-size: 1.5rem;">19</span><br>
                                                                    <span class="countdown-period font-poppins-regular" style="font-size: 1.5rem;">Seconds</span>
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                        
                                        <?php 
                                        
                                    }
                                ?>
                                <div class="row py-2 px-2">
                                    <div class="col-md-2 d-flex justify-content-center align-items-center">
                                        <img src="icons/certificate.png" class="w-100">
                                    </div>
                                    <div class="col-md-7 d-flex align-items-center">
                                        <h4 class="font-poppins-bold" style="font-size: 2rem;">Certificate of Participation</h4>
                                    </div>
                                    <div class="col-md-3 pl-0 d-flex justify-content-center align-items-center">
                                        <div class="w-100 cursor-pointer" style="border-radius: 10px; background-color: #00ABC9; color: white; ">
                                            <?php 
                                            
                                                if($new_batch == false){
                                                    ?>
                                                        <h5 class="font-poppins-bold m-0 p-2 text-center" onclick="certificate()"  style="font-size: 2rem;">REDEEM<br>NOW</h5>
                                                    <?php
                                                } else if($new_batch == true){
                                                    ?>
                                                        <h5 class="font-poppins-bold m-0 p-2 text-center" onclick="<?php
                                                            if(strtotime($countDownDate16) - strtotime($currentDate) < 0){
                                                                echo "certificate()";
                                                            }
                                                        ?>"   style="font-size: 2rem;">REDEEM<br>NOW</h5>
                                                    
                                                    <?php 
                                                    
                                                }
                                            ?>
                                            
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="w-100 mt-3" style="border-radius: 10px; border: 1px solid lightgray;">
                            <div class="container-fluid position-relative p-0 d-flex align-items-center" style="height: 200px">
                                <?php 
                                            
                                    if($new_batch == true || $new_batch == false){
                                        ?>
                                            <div class="w-100 h-100 position-absolute" style="background-color: black; opacity: 0.7; border-radius: 10px; z-index: 20;"></div>
                                                <div class="position-absolute w-100 h-100 d-flex justify-content-center align-items-center" style="z-index: 30;">
                                                    <div>
                                                        <h3 class="text-center text-white font-poppins-bold" style="font-size: 2.5rem;">UNLOCKS IN</h3>
                                                        <div class="wideCountdown clearfix cdLabelBold cdWhite cdLabelWhite cdStyleCircleLine wideCountdownSize1 is-countdown font-poppins-bold" data-date="03/26/2020" data-time="14" data-tz="india" data-url="#" data-lang="eng" data-color-time="rgb(255, 255, 255)" data-color-label="rgba(255, 255, 255, 0.3)" style="padding: 8px 0px;padding-left: 40px;font-size:9px;">
                                                            <span class="countdown-row countdown-show4">
                                                                <span class="countdown-section">
                                                                    <span class="days3 countdown-amount font-poppins-regular" style="font-size: 1.5rem;">11</span>
                                                                    <br>
                                                                    <span class="countdown-period font-poppins-regular" style="font-size: 1.5rem;">Days</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="hours3 countdown-amount font-poppins-regular" style="font-size: 1.5rem;">13</span><br>
                                                                    <span class="countdown-period font-poppins-regular" style="font-size: 1.5rem;">Hours</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="mins3 countdown-amount font-poppins-regular" style="font-size: 1.5rem;">56</span><br>
                                                                    <span class="countdown-period font-poppins-regular" style="font-size: 1.5rem;">Minutes</span>
                                                                </span>
                                                                <span class="countdown-section">
                                                                    <span class="secs3 countdown-amount font-poppins-regular" style="font-size: 1.5rem;">19</span><br>
                                                                    <span class="countdown-period font-poppins-regular" style="font-size: 1.5rem;">Seconds</span>
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                        
                                        <?php 
                                        
                                    }
                                ?>
                                <div class="row py-2 px-2">
                                    <div class="col-md-2 d-flex justify-content-center align-items-center">
                                        <img src="icons/blockchain-43-914983.png" class="w-100">
                                    </div>
                                    <div class="col-md-7 d-flex align-items-center">
                                        <h4 class="font-poppins-bold" style="font-size: 2rem;">Certificate on Blockchain</h4>
                                    </div>
                                    <div class="col-md-3 pl-0 d-flex justify-content-center align-items-center">
                                        <div class="w-100 cursor-pointer" style="border-radius: 10px; background-color: #00ABC9; color: white; ">
                                            <?php 
                                            
                                                if($new_batch == false){
                                                    ?>
                                                        <!-- <h5 class="font-poppins-bold m-0 p-2 text-center" onclick="certificate()"  style="font-size: 2rem;">REDEEM<br>NOW</h5> -->
                                                        <h5 class="font-poppins-bold m-0 p-2 text-center"  style="font-size: 2rem;">REDEEM<br>NOW</h5>
                                                    <?php
                                                } else if($new_batch == true){
                                                    ?>
                                                        <h5 class="font-poppins-bold m-0 p-2 text-center"  style="font-size: 2rem;">REDEEM<br>NOW</h5>
                                                    
                                                    <?php 
                                                    
                                                }
                                            ?>
                                            
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        
                        
                        
                    </div>
                </div>
            </div>

        
        </div>

        <!-- Modal -->
        <div class="modal fade" id="courses-mobile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 75% !important;" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="font-size: 3rem;">Courses for You</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="font-size: 3rem;">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="font-size: 2rem;">
                        No New Courses are available for you right now. Please check back later.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 2rem;">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="event-popup-mobile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 75% !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="font-size: 3rem;">Events for You</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="font-size: 3rem;">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="font-size: 2rem;">
                        No New Events are available for you right now. Please check back later.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 2rem;">Close</button>
                    </div>
                </div>
            </div>
        </div>

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

        // if(email == null){
        //     window.location = "user-login";
        // }

        // $.ajax({
        //     type:'POST',
        //     url:'php/user-dashboard-data.php',
        //     dataType: "json",
        //     data:{
        //         'email' : email
        //     },
        //     success:function(data){
        //         if(data.status == 201){
        //             name = data.name;
        //             phone = data.phone;
        //             // alert("success");
        //             $(".name").html(data.name);


        //         }else if(data.status == 401){
                    
        //         } else if(data.status == 301){
        //             //Email already registered
        //             alert(data.error);
        //             window.location = "user-login";
        //         }else if(data.status == 302){
        //             //phone already registered
        //             alert(data.error);
        //         } else if(data.status == 601){
        //             console.log(data.error);
        //             // alert("problem with query");
        //         }else{
                    
        //         } 
        //     }
        // });

        // The data/time we want to countdown to
        var countDownDate12 = new Date("<?php echo $countDownDate12; ?>").getTime();
        var countDownDate13 = new Date("<?php echo $countDownDate13; ?>").getTime();
        var countDownDate14 = new Date("<?php echo $countDownDate14; ?>").getTime();
        var countDownDate15 = new Date("<?php echo $countDownDate15; ?>").getTime();
        var countDownDate16 = new Date("<?php echo $countDownDate16; ?>").getTime();
        var countDownDate1 = new Date("<?php echo $countDownDate1; ?>").getTime();
        var countDownDate2 = new Date("<?php echo $countDownDate2; ?>").getTime();

        // Run myfunc every second
        var myfunc = setInterval(function() {

            var now = new Date().getTime();
           

            var timeleft1 = countDownDate1 - now;
            var timeleft12 = countDownDate12 - now;
            var timeleft13 = countDownDate13 - now;
            var timeleft14 = countDownDate14 - now;
            var timeleft15 = countDownDate15 - now;
            var timeleft16 = countDownDate16 - now;
            var timeleft2 = countDownDate2 - now;
                
            // Calculating the days, hours, minutes and seconds left
            var days1 = Math.floor(timeleft1 / (1000 * 60 * 60 * 24));
            var hours1 = Math.floor((timeleft1 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes1 = Math.floor((timeleft1 % (1000 * 60 * 60)) / (1000 * 60));
            var seconds1 = Math.floor((timeleft1 % (1000 * 60)) / 1000);

            var days12 = Math.floor(timeleft12 / (1000 * 60 * 60 * 24));
            var hours12 = Math.floor((timeleft12 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes12 = Math.floor((timeleft12 % (1000 * 60 * 60)) / (1000 * 60));
            var seconds12 = Math.floor((timeleft12 % (1000 * 60)) / 1000);

            var days13 = Math.floor(timeleft13 / (1000 * 60 * 60 * 24));
            var hours13 = Math.floor((timeleft13 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes13 = Math.floor((timeleft13 % (1000 * 60 * 60)) / (1000 * 60));
            var seconds13 = Math.floor((timeleft13 % (1000 * 60)) / 1000);

            var days14 = Math.floor(timeleft14 / (1000 * 60 * 60 * 24));
            var hours14 = Math.floor((timeleft14 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes14 = Math.floor((timeleft14 % (1000 * 60 * 60)) / (1000 * 60));
            var seconds14 = Math.floor((timeleft14 % (1000 * 60)) / 1000);

            var days15 = Math.floor(timeleft15 / (1000 * 60 * 60 * 24));
            var hours15 = Math.floor((timeleft15 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes15 = Math.floor((timeleft15 % (1000 * 60 * 60)) / (1000 * 60));
            var seconds15 = Math.floor((timeleft15 % (1000 * 60)) / 1000);

            var days16 = Math.floor(timeleft16 / (1000 * 60 * 60 * 24));
            var hours16 = Math.floor((timeleft16 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes16 = Math.floor((timeleft16 % (1000 * 60 * 60)) / (1000 * 60));
            var seconds16 = Math.floor((timeleft16 % (1000 * 60)) / 1000);

            var days2 = Math.floor(timeleft2 / (1000 * 60 * 60 * 24));
            var hours2 = Math.floor((timeleft2 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes2 = Math.floor((timeleft2 % (1000 * 60 * 60)) / (1000 * 60));
            var seconds2 = Math.floor((timeleft2 % (1000 * 60)) / 1000);
             
            // event timer
            if(document.getElementsByClassName("days1")[0] !== undefined ){
                document.getElementsByClassName("days1")[0].innerHTML = days1 
                document.getElementsByClassName("hours1")[0].innerHTML = hours1 
                document.getElementsByClassName("mins1")[0].innerHTML = minutes1 
                document.getElementsByClassName("secs1")[0].innerHTML = seconds1 

                document.getElementsByClassName("days1")[1].innerHTML = days1 
                document.getElementsByClassName("hours1")[1].innerHTML = hours1 
                document.getElementsByClassName("mins1")[1].innerHTML = minutes1 
                document.getElementsByClassName("secs1")[1].innerHTML = seconds1 

                // Display the message when countdown is over
                if (timeleft1 < 0) {
                    clearInterval(myfunc);
                    document.getElementsByClassName("days1")[0].innerHTML = "00"
                    document.getElementsByClassName("hours1")[0].innerHTML = "00" 
                    document.getElementsByClassName("mins1")[0].innerHTML = "00"
                    document.getElementsByClassName("secs1")[0].innerHTML = "00"

                    document.getElementsByClassName("days1")[1].innerHTML = "00"
                    document.getElementsByClassName("hours1")[1].innerHTML = "00" 
                    document.getElementsByClassName("mins1")[1].innerHTML = "00"
                    document.getElementsByClassName("secs1")[1].innerHTML = "00"


                    document.getElementsByClassName("end1").innerHTML = "TIME UP!!";
                    
                }
            }

            

            
            
            // glossary timer
            if(document.getElementsByClassName("days2")[0] !== undefined){
                document.getElementsByClassName("days2")[0].innerHTML = days12 
                document.getElementsByClassName("hours2")[0].innerHTML = hours12
                document.getElementsByClassName("mins2")[0].innerHTML = minutes12 
                document.getElementsByClassName("secs2")[0].innerHTML = seconds12 

                document.getElementsByClassName("days2")[5].innerHTML = days12 
                document.getElementsByClassName("hours2")[5].innerHTML = hours12 
                document.getElementsByClassName("mins2")[5].innerHTML = minutes12 
                document.getElementsByClassName("secs2")[5].innerHTML = seconds12 

                if (timeleft12 < 0) {
                    clearInterval(myfunc);
                    document.getElementsByClassName("days2")[0].innerHTML = "00"
                    document.getElementsByClassName("hours2")[0].innerHTML = "00" 
                    document.getElementsByClassName("mins2")[0].innerHTML = "00"
                    document.getElementsByClassName("secs2")[0].innerHTML = "00"

                    document.getElementsByClassName("days2")[5].innerHTML = "00"
                    document.getElementsByClassName("hours2")[5].innerHTML = "00" 
                    document.getElementsByClassName("mins2")[5].innerHTML = "00"
                    document.getElementsByClassName("secs2")[5].innerHTML = "00"

                    document.getElementsByClassName("end2").innerHTML = "TIME UP!!";
                    
                }
            }
            

            
            // bonus timer
            if(document.getElementsByClassName("days2")[1] !== undefined){
                document.getElementsByClassName("days2")[1].innerHTML = days13 
                document.getElementsByClassName("hours2")[1].innerHTML = hours13
                document.getElementsByClassName("mins2")[1].innerHTML = minutes13 
                document.getElementsByClassName("secs2")[1].innerHTML = seconds13 

                document.getElementsByClassName("days2")[6].innerHTML = days13 
                document.getElementsByClassName("hours2")[6].innerHTML = hours13 
                document.getElementsByClassName("mins2")[6].innerHTML = minutes13 
                document.getElementsByClassName("secs2")[6].innerHTML = seconds13 

                if (timeleft13 < 0) {
                    clearInterval(myfunc);
                    document.getElementsByClassName("days2")[1].innerHTML = "00"
                    document.getElementsByClassName("hours2")[1].innerHTML = "00" 
                    document.getElementsByClassName("mins2")[1].innerHTML = "00"
                    document.getElementsByClassName("secs2")[1].innerHTML = "00"

                    document.getElementsByClassName("days2")[6].innerHTML = "00"
                    document.getElementsByClassName("hours2")[6].innerHTML = "00" 
                    document.getElementsByClassName("mins2")[6].innerHTML = "00"
                    document.getElementsByClassName("secs2")[6].innerHTML = "00"

                    document.getElementsByClassName("end2").innerHTML = "TIME UP!!";
                    
                }
            }   
            

            
            // case study timer
            if(document.getElementsByClassName("days2")[2] !== undefined){
                document.getElementsByClassName("days2")[2].innerHTML = days14
                document.getElementsByClassName("hours2")[2].innerHTML = hours14
                document.getElementsByClassName("mins2")[2].innerHTML = minutes14
                document.getElementsByClassName("secs2")[2].innerHTML = seconds14

                document.getElementsByClassName("days2")[7].innerHTML = days14
                document.getElementsByClassName("hours2")[7].innerHTML = hours14
                document.getElementsByClassName("mins2")[7].innerHTML = minutes14
                document.getElementsByClassName("secs2")[7].innerHTML = seconds14


                if (timeleft14 < 0) {
                    clearInterval(myfunc);
                    document.getElementsByClassName("days2")[2].innerHTML = "00"
                    document.getElementsByClassName("hours2")[2].innerHTML = "00" 
                    document.getElementsByClassName("mins2")[2].innerHTML = "00"
                    document.getElementsByClassName("secs2")[2].innerHTML = "00"

                    document.getElementsByClassName("days2")[7].innerHTML = "00"
                    document.getElementsByClassName("hours2")[7].innerHTML = "00" 
                    document.getElementsByClassName("mins2")[7].innerHTML = "00"
                    document.getElementsByClassName("secs2")[7].innerHTML = "00"

                    document.getElementsByClassName("end2").innerHTML = "TIME UP!!";
                    
                }
            }
            
            
            // defi book timer
            if(document.getElementsByClassName("days2")[3] !== undefined){
                document.getElementsByClassName("days2")[3].innerHTML = days15
                document.getElementsByClassName("hours2")[3].innerHTML = hours15
                document.getElementsByClassName("mins2")[3].innerHTML = minutes15
                document.getElementsByClassName("secs2")[3].innerHTML = seconds15

                document.getElementsByClassName("days2")[8].innerHTML = days15
                document.getElementsByClassName("hours2")[8].innerHTML = hours15
                document.getElementsByClassName("mins2")[8].innerHTML = minutes15
                document.getElementsByClassName("secs2")[8].innerHTML = seconds15

                if (timeleft15 < 0) {
                    clearInterval(myfunc);
                    document.getElementsByClassName("days2")[3].innerHTML = "00"
                    document.getElementsByClassName("hours2")[3].innerHTML = "00" 
                    document.getElementsByClassName("mins2")[3].innerHTML = "00"
                    document.getElementsByClassName("secs2")[3].innerHTML = "00"

                    document.getElementsByClassName("days2")[8].innerHTML = "00"
                    document.getElementsByClassName("hours2")[8].innerHTML = "00" 
                    document.getElementsByClassName("mins2")[8].innerHTML = "00"
                    document.getElementsByClassName("secs2")[8].innerHTML = "00"

                    document.getElementsByClassName("end2").innerHTML = "TIME UP!!";
                    
                }
            }
            

            // certificate timer
            if(document.getElementsByClassName("days2")[4] !== undefined){
                document.getElementsByClassName("days2")[4].innerHTML = days16
                document.getElementsByClassName("hours2")[4].innerHTML = hours16
                document.getElementsByClassName("mins2")[4].innerHTML = minutes16
                document.getElementsByClassName("secs2")[4].innerHTML = seconds16

                document.getElementsByClassName("days2")[9].innerHTML = days16
                document.getElementsByClassName("hours2")[9].innerHTML = hours16
                document.getElementsByClassName("mins2")[9].innerHTML = minutes16
                document.getElementsByClassName("secs2")[9].innerHTML = seconds16


                if (timeleft16 < 0) {
                    clearInterval(myfunc);
                    document.getElementsByClassName("days2")[4].innerHTML = "00"
                    document.getElementsByClassName("hours2")[4].innerHTML = "00" 
                    document.getElementsByClassName("mins2")[4].innerHTML = "00"
                    document.getElementsByClassName("secs2")[4].innerHTML = "00"

                    document.getElementsByClassName("days2")[9].innerHTML = "00"
                    document.getElementsByClassName("hours2")[9].innerHTML = "00" 
                    document.getElementsByClassName("mins2")[9].innerHTML = "00"
                    document.getElementsByClassName("secs2")[9].innerHTML = "00"

                    document.getElementsByClassName("end2").innerHTML = "TIME UP!!";
                    
                }
            }


            // blockchain certificate timer
            if(document.getElementsByClassName("days3")[0] !== undefined){
                document.getElementsByClassName("days3")[0].innerHTML = days2
                document.getElementsByClassName("hours3")[0].innerHTML = hours2
                document.getElementsByClassName("mins3")[0].innerHTML = minutes2
                document.getElementsByClassName("secs3")[0].innerHTML = seconds2

                document.getElementsByClassName("days3")[1].innerHTML = days2
                document.getElementsByClassName("hours3")[1].innerHTML = hours2
                document.getElementsByClassName("mins3")[1].innerHTML = minutes2
                document.getElementsByClassName("secs3")[1].innerHTML = seconds2


                if (timeleft2 < 0) {
                    clearInterval(myfunc);
                    document.getElementsByClassName("days3")[0].innerHTML = "00"
                    document.getElementsByClassName("hours3")[0].innerHTML = "00" 
                    document.getElementsByClassName("mins3")[0].innerHTML = "00"
                    document.getElementsByClassName("secs3")[0].innerHTML = "00"

                    document.getElementsByClassName("days3")[1].innerHTML = "00"
                    document.getElementsByClassName("hours3")[1].innerHTML = "00" 
                    document.getElementsByClassName("mins3")[1].innerHTML = "00"
                    document.getElementsByClassName("secs3")[1].innerHTML = "00"

                    document.getElementsByClassName("end3").innerHTML = "TIME UP!!";
                    
                }
            }
            

            
            
            
            
        }, 1000);


        $("#event").on("click", function(){
            $("#event-pop").css('display', 'flex');
        });

        $("#go-back").on("click", function(){
            $("#event-pop").css('display', 'none');
        });

        $("#event-mobile").on("click", function(){
            $("#event-pop-mobile").css('display', 'flex');
        });

        $("#go-back-mobile").on("click", function(){
            $("#event-pop-mobile").css('display', 'none');
        });

        function certificate(){
            var certiName = email.toString().replace(/@/g, "-");
            var certiName = certiName.replace(/\./g, "-");
            window.open('https://cryptonite.finstreet.in/docs/certificate/'+ certiName +'.pdf','_blank');
        }
        
    </script>
</body>
</html>