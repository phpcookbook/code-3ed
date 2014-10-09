<?php
    http_response_code(201); // Created
    $site = 'https://api.example.com';
    header("Location: $site/" . $_SERVER['REQUEST_URI'] . "/$id");
    print $json;
