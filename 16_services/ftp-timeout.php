<?php
// Up the time out value to two minutes:
set_time_limit(120);
$c = ftp_connect('ftp.example.com');
ftp_set_option($c, FTP_TIMEOUT_SEC, 120);
