<?php
http_response_code(422); // Unprocessable Entity

$error_body = [
    "error" => "12",
    "message" => "Missing required field: job title"
];

print json_encode($error_body);
