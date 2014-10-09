<?php
require 'HTTP/Request2.php';
$r = new HTTP_Request2('http://www.example.com/needs-cookies.php');
$r->addCookie('user', 'ellen');
$r->addCookie('activity', 'swimming');
$page = $r->send()->getBody();
echo $page;

