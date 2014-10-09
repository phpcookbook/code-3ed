<?php

$plaintext_body = 'Some sensitive order data';
$recipient = 'ordertaker@example.com';

$g = gnupg_init();
gnupg_seterrormode($g, GNUPG_ERROR_WARNING);
// Fingerprint of the recipient's key
$a = gnupg_addencryptkey($g, "5495F0CA9C8F30A9274C2259D7EBE8584CEF302B");
// Fingerprint of the sender's key
$b = gnupg_addsignkey($g, "520D5FC5C85EF4F4F9D94E1C1AF1F7C5916FC221",
                 "passphrase");

$encrypted_body = gnupg_encryptsign($g, $plaintext_body);

mail($recipient, 'Web Site Order', $encrypted_body);
