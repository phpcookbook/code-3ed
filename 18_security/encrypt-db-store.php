<?php

/* Encrypt the data. */
$algorithm  = MCRYPT_BLOWFISH;
$mode = MCRYPT_MODE_CBC;
$iv = mcrypt_create_iv(mcrypt_get_iv_size($algorithm, $mode), MCRYPT_DEV_URANDOM);
$ciphertext = mcrypt_encrypt($algorithm, $_POST['key'], $_POST['data'], $mode, $iv);

/* Store the encrypted data. */
$st = $db->prepare('INSERT
            INTO   noc_list (algorithm, mode, iv, data)
            VALUES (?, ?, ?, ?)');
$st->execute(array($algorithm, $mode, $iv, $ciphertext));
