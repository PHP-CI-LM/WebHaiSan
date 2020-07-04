<?php
 
//Include Google Client Library for PHP autoload file
require_once require_once APPPATH .'third_party/google-api-php-client-2.4.1/vendor/autoload.php';
 
//Make object of Google API Client for call Google API
$google_client = new Google_Client();
 
//Set the OAuth 2.0 Client ID
$google_client->setClientId('497217889316-cj27ml9sooers5g97ui55c4e984lb84c.apps.googleusercontent.com');
 
//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('e8XOes7-JtWmyhccgAICitcQ');
 
//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('url_redirect_url');
 
// //start session on web page
// session_start();
 
?>