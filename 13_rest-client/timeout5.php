<?php
require_once 'HTTP/Request2.php';

$r = new HTTP_Request2('http://slow.example.com/');
$r->setConfig(array(
    'timeout' => 20
));

$page = $r->send()->getBody();
