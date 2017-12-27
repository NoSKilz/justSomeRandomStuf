<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    session_start();
    require_once 'config.php';
    try 
    {
        $accessToken = $helper->getAccessToken();
    } 
    catch(Facebook\Exceptions\FacebookResponseException $e) 
    {
        // When Graph returns an error
        echo "Graph returned an error: {$e->getMessage()}";
        exit;
    } 
    catch(Facebook\Exceptions\FacebookSDKException $e) 
    {
        // When validation fails or other local issues
        echo "Facebook SDK returned an error: {$e->getMessage()}";
        exit;
    }
    if(!isset($accessToken)) 
    {
        if($helper->getError()) 
        {
            header('HTTP/1.0 401 Unauthorized');
            echo "Error: {$helper->getError()}\n";
            echo "Error Code: {$helper->getErrorCode()}\n";
            echo "Error Reason: {$helper->getErrorReason()}\n";
            echo "Error Description: {$helper->getErrorDescription()}\n";
        } 
        else 
        {
            header('HTTP/1.0 400 Bad Request');
            echo 'Bad request';
        }
        exit;
    }
    else 
    {
        $fb->setDefaultAccessToken($accessToken);
    }
    $oAuth2Client = $fb->getOAuth2Client();
    if (!$accessToken->isLongLived()) 
    {
        // Exchanges a short-lived access token for a long-lived one
        try 
        {
            $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
        } 
        catch(Facebook\Exceptions\FacebookSDKException $e) 
        {
            echo "<p>Error getting long-lived access token: {$helper->getMessage()} </p>\n\n";
            exit;
        }
    }
    try
    {
        $response = $fb->get('/me?fields=id,first_name,last_name,email,picture.type(large),locale');
    } 
    catch(Facebook\Exceptions\FacebookResponseException $e) 
    {
        // When Graph returns an error
        echo 'Graph returned an error1: ' . $e->getMessage();
        exit;
    } 
    catch(Facebook\Exceptions\FacebookSDKException $e) 
    {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error1: ' . $e->getMessage();
        exit;
    }
    $userData = $response->getGraphNode()->asArray();
    $_SESSION['user_data'] = $userData;
    $_SESSION['fb_access_token'] = (string)$accessToken;
    header('Location: index.php');
