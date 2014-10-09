<?php
require 'HTTP/Request2.php';

$r = new HTTP_Request2;
$r->setCookieJar(true);

// log in
$r->setUrl('https://bank.example.com/login.php?user=donald&password=b1gmoney$');
$page = $r->send()->getBody();

// retrieve account balance
$r->setUrl('http://bank.example.com/balance.php?account=checking');
$page = $r->send()->getBody();

// make a deposit
$r->setUrl('http://bank.example.com/deposit.php');
$r->setMethod(HTTP_Request2::METHOD_POST)
    ->addPostParameter('account', 'checking')
    ->addPostParameter('amount','122.44');

$page = $r->send()->getBody();
