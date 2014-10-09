<?php

$email = 'friend@example.com';

$g = gnupg_init();
$keys = gnupg_keyinfo($g, $email);
if (count($keys) == 1) {
    $fingerprint = $keys[0]['subkeys'][0]['fingerprint'];
    print "Fingerprint for $email is $fingerprint";
}
else {
    print "Expected 1, found " . count($keys) .
        " keys for $email";
}