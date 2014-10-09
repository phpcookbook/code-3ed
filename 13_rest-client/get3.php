<?php
require_once 'HTTP/Request2.php';
$r = new HTTP_Request2('http://www.example.com/robots.txt');
$page = $r->send()->getBody();
