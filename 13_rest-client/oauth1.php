<?php
// Get your LinkedIn REST API keys from https://developer.linkedin.com
$consumer_key =      "YOUR_API_KEY_HERE";
$consumer_secret =   "YOUR_API_SECRET_HERE";

// Change these if you switch to another API Provider
$request_token_url = "https://api.linkedin.com/uas/oauth/requestToken";
$access_token_url  = "https://api.linkedin.com/uas/oauth/accessToken";
$auth_url =          "https://www.linkedin.com/uas/oauth/authenticate";

// You'll probably use a database
session_name('linkedin');
session_start();

try { 
    $oauth = new OAuth($consumer_key, $consumer_secret);
    $oauth->enableDebug();

    // Did we already get an oauth token and secret for the user?
    if(!isset($_SESSION['token']) && !isset($_SESSION['secret'])) {

        // Revert to the beginning if we didn't get the callback we expected
        if(!isset($_GET['oauth_token']) && $_SESSION['state'] == 1) { 
            $_SESSION['state'] = 0; 
        }
        
        // Begin the OAuth "dance"
        if(!isset($_GET['oauth_token']) && !$_SESSION['state']) {
            // Get and store request token
            $callback_url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'];
            $request_token_info = $oauth->getRequestToken($request_token_url, $callback_url);
            $_SESSION['secret'] = $request_token_info['oauth_token_secret'];
            $_SESSION['state'] = 1;

            $url = isset($request_token_info['xoauth_request_auth_url']) ? 
                    $request_token_info['xoauth_request_auth_url'] : $auth_url;
            $oauth_token = urlencode($request_token_info['oauth_token']);

            header("Location: $url?oauth_token=$oauth_token");
            exit;
        } else // Continue the dance
            if($_SESSION['state'] == 1) {
            //get the access token and store it
            $request_token_secret = $_SESSION['secret'];
            $oauth->setToken($_GET['oauth_token'], $request_token_secret);
            $access_token_info = $oauth->getAccessToken($access_token_url, '', 
                                    $_GET['oauth_verifier']);
        
            $_SESSION['token'] = $access_token_info['oauth_token'];
            $_SESSION['secret'] = $access_token_info['oauth_token_secret'];
        }
    }

    // Identify the user. Omit this to make a "two-legged" call.
    $oauth->setToken($_SESSION['token'], $_SESSION['secret']);

    // Sign and make the API call
    // This example GETs the authenticated member's first name formatted in JSON
    $url = 'https://api.linkedin.com/v1/people/~:(firstName)';
    $oauth->fetch($url, array(), OAUTH_HTTP_METHOD_GET, array('x-li-format' => 'json'));

    // Retrieve and desserialize the response
    $response_json = $oauth->getLastResponse();
    $response = json_decode($response_json);
    print "Hello $response->firstName!\n";
} catch(OAuthException $e) {
    print $e;
}
