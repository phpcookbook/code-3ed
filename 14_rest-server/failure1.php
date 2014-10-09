<?php
http_response_code(401); // Unauthorized

$error_body = [
    "error" => "Unauthorized",
    "code" => 1,
    "message" => "Only authenticated users can read " . $_SERVER['REQUEST_URI'],
    "url" => "http://developer.example.com/error/1"
];

print json_encode($error_body);
