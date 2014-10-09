<?php
require_once 'Stream/SHM.php';
stream_register_wrapper('shm','Stream_SHM') or die("can't register shm");
$shm = fopen('shm://0xabcd','c');
fwrite($shm, "Current time is: " . time());
fclose($shm);
