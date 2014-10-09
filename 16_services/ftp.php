<?php
$c = ftp_connect('ftp.example.com')     or die("Can't connect");
ftp_login($c, $username, $password)     or die("Can't login");
ftp_put($c, $remote, $local, FTP_ASCII) or die("Can't transfer");
ftp_close($c)                           or die("Can't close");
