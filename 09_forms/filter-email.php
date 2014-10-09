<?php
function request_with($data) {
    $c = curl_init('http://localhost:9876');
    curl_setopt_array($c, array(CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_POST => true,
                                CURLOPT_POSTFIELDS => $data));

    return curl_exec($c);
}

// OK
$data = array('email' => 'foo@bar.com');
$response1 = request_with($data);


// OK
$data = array('email' => 'foo.bar=baz+quux@zeep.zap.zump');
$response2 = request_with($data);


// Bad
$data = array('email' => 'alex@blobby');
$response3 = request_with($data);


// Bad
$data = array('email' => 'pants');
$response4 = request_with($data);
