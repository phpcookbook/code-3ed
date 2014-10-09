<?php
require 'vendor/autoload.php';

use Guzzle\Http\Client;

// Create a client to work with the LinkedIn API
$client = new Client('https://api.linkedin.com/{version}', array(
    'version' => 'v1'
));
