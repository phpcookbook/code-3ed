<?php
require 'HTTP/Request2.php';

$r = new HTTP_Request2('http://www.example.com/secrets.php');
$r->setAuth('david', 'hax0r', HTTP_Request2::AUTH_DIGEST);
$page = $r->send()->getBody();

