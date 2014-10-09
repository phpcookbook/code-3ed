<?php

$message = new ezcMailComposer();
$message->from = new ezcMailAddress('webmaster@example.com');
$message->addTo(new ezcMailAddress('adam@example.com', 'Adam'));
$message->subject = 'New Version of PHP Released!';
$body = 'Go to http://www.php.net and download it today!';
$message->plainText = $body;
$message->build();

$host = 'smtpauth.example.com';
$username = 'philb';
$password = 'jf430k24';
$port = 587;

$smtpOptions = new ezcMailSmtpTransportOptions();
$smtpOptions->preferredAuthMethod = ezcMailSmtpTransport::AUTH_LOGIN;

$sender = new ezcMailSmtpTransport($host, $username, $password, $port, $smtpOptions);

$sender->send($message);
