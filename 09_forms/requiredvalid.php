<?php
function request_with($data) {
    $c = curl_init('http://localhost:9876');
    curl_setopt_array($c, array(CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_POST => true,
                                CURLOPT_POSTFIELDS => $data));

    return curl_exec($c);
}

// All errors
$data = array('color' => 'beep',
              'choices' => 'foo');
$response1 = request_with($data);

// All OK
$data = "flavor=something&color=beebly&choices[]=foo&choices[]=bar";
$response2 = request_with($data);
