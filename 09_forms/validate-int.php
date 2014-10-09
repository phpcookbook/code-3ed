<?php


function request_with($data) {
    $c = curl_init('http://localhost:9876');
    curl_setopt_array($c, array(CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_POST => true,
                                CURLOPT_POSTFIELDS => $data));

    return curl_exec($c);
}

// OK
$data = array('age' => '15');
$response1 = request_with($data);

// OK
$data = array('age' => ' 15 ');
$response2 = request_with($data);

// OK
$data = array('age' => '-15');
$response3 = request_with($data);

// Bad
$data = array('age' => '14.3');
$response4 = request_with($data);

// Bad
$data = array('age' => 'pants');
$response5 = request_with($data);
