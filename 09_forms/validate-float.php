<?php


function request_with($data) {
    $c = curl_init('http://localhost:9876');
    curl_setopt_array($c, array(CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_POST => true,
                                CURLOPT_POSTFIELDS => $data));

    return curl_exec($c);
}

// OK
$data = array('price' => '15');
$response1 = request_with($data);

// OK
$data = array('price' => ' 15 ');
$response2 = request_with($data);

// OK
$data = array('price' => '-15');
$response3 = request_with($data);

// OK
$data = array('price' => '-15.2');
$response4 = request_with($data);

// OK
$data = array('price' => '15.93242');
$response5 = request_with($data);

// Bad
$data = array('price' => '14..3');
$response6 = request_with($data);

// Bad
$data = array('price' => 'pants');
$response7 = request_with($data);
