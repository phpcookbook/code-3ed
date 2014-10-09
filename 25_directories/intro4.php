<?php
$old_umask = umask(0077);
touch('secret-file.txt');
umask($old_umask);
