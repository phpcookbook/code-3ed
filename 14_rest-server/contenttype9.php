<?php
require_once 'HTTP2.php';
$http = new HTTP2;
$supportedTypes = array(
    'application/json',
    'text/xml',
);
 
$type = $http->negotiateMimeType($supportedTypes, false);
if ($type === false) {
    http_response_code(406); // Not Acceptable
    $error_body = 'Choose one of: ' . join(',', $supportedTypes);
    print json_encode($error_body);
} else {
    // format response based on $type
}
