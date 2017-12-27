<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once __DIR__ . '/vendor/autoload.php'; // change path as needed
$fb = new \Facebook\Facebook(['app_id' => '567662206922146',
                              'app_secret' => 'd76ddb11d2a6a4c621b625cfeba3ab02',
                              'default_graph_version' => 'v2.11',
                              //'default_access_token' => '{access-token}', // optional
                             ]);
$helper = $fb->getRedirectLoginHelper();