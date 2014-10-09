<?php
require 'HTTP/Request2.php';
$r = new HTTP_Request2('http://www.example.com/submit.php');
$r = new HTTP_Request2('http://localhost/submit.php');
$r->setMethod(HTTP_Request2::METHOD_POST)
    ->addPostParameter('monkey', 'uncle');
$response = $r->send();


$response_headers = $response->getHeader();
$response_body    = $response->getBody();