<?php
require 'HTTP/Request2.php';

$url = 'http://www.example.com/submit.php';
$r = new HTTP_Request2($url);

$r->setMethod(HTTP_Request2::METHOD_POST)
    ->addPostParameter('monkey', 'uncle')
    ->addPostParameter('rhino','aunt');

$page = $r->send()->getBody();