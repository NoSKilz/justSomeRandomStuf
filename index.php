<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    session_start();
    require_once 'config.php';
    $redirectURL = 'http://localhost/socialtest/fb-fallback.php';
    $permissions = ['email'];
    $loginURL = $helper->getLoginUrl($redirectURL,$permissions);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta property="fb:app_id" content="567662206922146"/>
        <link rel="stylesheet" type="text/css" href="custom/css/main.css"/>
        <title>Some title</title>
    </head>
    <body id="stuff">
        <div id="fb-root"></div>
        <script src="custom/js/fb_init.js" type="text/javascript"></script>
        
        <!-- header start -->
        <div id="header"><p>hbjksdahcjkasdcjkasdjk</p></div>
        <!-- header end -->
        
        <!-- fb start -->
        <div id="fb_stuff">
            <form>
                <input type="submit" value="login">
                <?php $logoutUrl = $helper->getLogoutUrl($_SESSION['fb_access_token'], 'http://localhost/socialtest/index.php');?>
                <a href='<?php echo htmlspecialchars($logoutUrl); ?>'>Logout of Facebook! PHP</a>
                <a href="<?php echo htmlspecialchars($loginURL) ?>">Log in with Facebook! PHP</a>
                <a href="#" id="in">Log in with Facebook! JS</a>
                <a href="#" id="out">Logout of Facebook! JS</a>
            </form> 
            <div class="fb-comments" data-href="http://localhost/socialtest/index.php" data-numposts="10"></div>
            <div class="fb-post" data-href="https://www.facebook.com/NoSkiillz/posts/963791507004815"></div>
            <div class="fb-like" data-href="http://localhost/socialtest/index.php" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
            <script src="custom/js/fb_login.js" type="text/javascript"></script>
            <script src="custom/js/fb_logout.js" type="text/javascript"></script>
            <?php
                /*echo $helper->getSession();
                echo "<img src='{$_SESSION['user_data']['picture']['url']}'>
                      <p>{$_SESSION['user_data']['id']}</p>
                      <p>{$_SESSION['user_data']['first_name']}</p>
                      <p>{$_SESSION['user_data']['last_name']}</p>
                      <p>{$_SESSION['user_data']['email']}</p>
                      <p>{$_SESSION['user_data']['locale']}</p>";*/
            ?>
        </div>
        <!-- fb end -->
        
        <!-- random stuff start -->
        <div id="random_stuff">
            <a href="#timeline">m</a>
       
            <div id="erl">
                <button id="button1">lul1</button>
                <button id="button2"><span>lul2</span></button>
            </div>

            <!-- slideshow start -->
            <div id="slideshow-container">
                <div class="slides fade">
                    <div class="numbertext">1 / 4</div>
                    <img class="img-1 img" src="images/15541677_572018949663421_2681440333759592237_n.jpg" data-num="1" alt="kawai1">
                    <div class="text">Caption Text</div>
                </div>
                <div class="slides fade">
                    <div class="numbertext">2 / 4</div>
                    <img class="img-2 img" src="images/16403192_1416705545058992_668892125700792232_o.jpg" data-num="2" alt="kawai2">
                    <div class="text">Caption Two</div>
                </div>
                <div class="slides fade">
                    <div class="numbertext">3 / 4</div>
                    <img class="img-3 img" src="images/kanna_by_akizero1510-db9tj8o.jpg" data-num="3" alt="kawai3">
                    <div class="text">Caption Three</div>
                </div>
                <div class="slides fade">
                    <div class="numbertext">4 / 4</div>
                    <img class="img-4 img" src="images/Konachan.com - 237332 anthropomorphism kajaneko kantai_collection tagme_(character).png" data-num="4" alt="kawai4">
                    <div class="text">Caption Four</div>
                </div>
                <a class="prev">&#10094;</a>
                <a class="next">&#10095;</a>
            </div>
            <br>
            <div style="text-align:center">
                <span class="dot" data-num="1"></span> 
                <span class="dot" data-num="2"></span> 
                <span class="dot" data-num="3"></span> 
                <span class="dot" data-num="4"></span> 
            </div>
            <!-- slideshow end -->

            <!-- lightbox start -->
            <div id="modal">
                <span class="close cursor">&times;</span>
                <div class="modal-content">
                    <div class="slidess">
                        <div class="numbertext">4 / 4</div>
                        <img id="mimg" class="fade" src="" style="width:100%" alt=''>
                    </div>
                    <a class="prev">&#10094;</a>
                    <a class="next">&#10095;</a>
                </div>
            </div>
            <!-- lightbox end -->

            <!-- timeline start -->
            <div id="timeline">
                <div class="container left">
                    <div class="content">
                        <h2>2017</h2>
                        <p>Lorem ipsum..</p>
                    </div>
                </div>
                <div class="container right">
                    <div class="content">
                        <h2>2016</h2>
                        <p>Lorem ipsum..</p>
                    </div>
                </div>
            </div>
            <!-- timeline end -->
            
        </div>
        <!-- random stuff end -->
        
        <script src="custom/js/functions.js" type="text/javascript"></script>
        <script src="custom/js/sticky_header.js" type="text/javascript"></script>
        <script src="custom/js/slideshow_lightbox.js" type="text/javascript"></script>
    </body>
</html>
