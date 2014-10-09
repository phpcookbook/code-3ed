<?php
$shm = new pc_Shm();
$secret_code = 'land shark';
$shm->write('mysecret', strlen($secret_code), $secret_code);
