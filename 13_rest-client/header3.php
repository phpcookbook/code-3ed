<?php
require 'HTTP/Request2.php';

$r = new HTTP_Request2('http://www.example.com/special-header.php');
$r->setHeader(array('X-Factor' => 12, 'My-Header','Bob'));
$page = $r->send()->getBody();
print $page;