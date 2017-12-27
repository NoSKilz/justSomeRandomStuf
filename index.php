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
        <meta property="fb:app_id" content="567662206922146" />
        <title></title>
    </head>
    <body>
        <div id="fb-root"></div>
        <script>
            window.fbAsyncInit = function() 
            {
                FB.init({
                    appId            : '567662206922146',
                    autoLogAppEvents : true,
                    cookie           : true,
                    status           : true,
                    version          : 'v2.11',
                    xfbml            : true
                });
                FB.getLoginStatus(function(response) 
                {
                    if(response.status === 'connected') 
                    {
                        console.log('Logged in.');
                    }
                    else if(response.status === 'not_authorized')
                    {
                        console.log('Logged in, but not authorized.');
                    }
                    else 
                    {
                        console.log('Not logged in.');
                    }
                },true);
            };
            (function(d, s, id) 
            {
                var js,fjs = d.getElementsByTagName(s)[0];
                if(d.getElementById(id))
                {
                    return;
                }
                js = d.createElement(s); 
                js.id = id;
                js.src = 'https://connect.facebook.net/cs_CZ/sdk/debug.js';
                fjs.parentNode.insertBefore(js, fjs);
            }
            (document, 'script', 'facebook-jssdk'));
        </script>
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
        <script>
            document.getElementById('in').addEventListener('click',function(){
                FB.login(function(response){
                    if (response.authResponse) 
                    {
                        console.log('Welcome!  Fetching your information.... ');
                        FB.api('/me', function(response) 
                        {
                            console.log('Good to see you, ' + response.name + '.');
                        });
                    } 
                    else 
                    {
                        console.log('User cancelled login or did not fully authorize.');
                    }
                    console.log(response.authResponse);
                },{scope:'public_profile,email',return_scopes:true});
            });
            document.getElementById('out').addEventListener('click',function(){
                FB.logout(function(response){
                    console.log(response);
                    console.log('Logged out.');
                });
            });
        </script>
        <?php
            echo $helper->getSession();
            echo "<img src='{$_SESSION['user_data']['picture']['url']}'>
                  <p>{$_SESSION['user_data']['id']}</p>
                  <p>{$_SESSION['user_data']['first_name']}</p>
                  <p>{$_SESSION['user_data']['last_name']}</p>
                  <p>{$_SESSION['user_data']['email']}</p>
                  <p>{$_SESSION['user_data']['locale']}</p>";
        ?>
    </body>
</html>
