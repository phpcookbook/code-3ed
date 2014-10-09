<?php

$user = 'bank';
$password = 'fas8uj3';
$algorithm  = MCRYPT_BLOWFISH;
$mode = MCRYPT_MODE_CBC;
$key  = "There are many ways to butter your toast.";

$url = 'https://bank.example.com/accounts.php';

$c = curl_init($url);
curl_setopt($c, CURLOPT_USERPWD, "$user:$password");
curl_setopt($c, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($c);
if (FALSE === $data) {
    exit("Transfer failed: " . curl_error($c));
}

$binary_data = base64_decode($data);
$iv_size = mcrypt_get_iv_size($algorithm, $mode);
$iv = substr($binary_data, 0, $iv_size);
$ciphertext = substr($binary_data, $iv_size, strlen($binary_data));

echo mcrypt_decrypt($algorithm, $key, $ciphertext, $mode, $iv);
