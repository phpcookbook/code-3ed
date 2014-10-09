<?php

$message = new ezcMailComposer();
$message->from = new ezcMailAddress('webmaster@example.com');
$message->addTo(new ezcMailAddress('adam@example.com', 'Adam'));
$message->subject = 'New Version of PHP Released!';
$body = 'Go to http://www.php.net and download it today!';
$message->plainText = $body;
$html = '<html><body><b>Hooray!</b> New PHP Version!</body></html>';
$message->htmlText = $html;
$message->build();

$sender = new ezcMailMtaTransport();
$sender->send($message);
