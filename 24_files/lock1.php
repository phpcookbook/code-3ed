<?php
$fh = fopen('guestbook.txt','a')         or die($php_errormsg);
flock($fh,LOCK_EX)                       or die($php_errormsg);
fwrite($fh,$_POST['guestbook_entry']) or die($php_errormsg);
fflush($fh)                              or die($php_errormsg);
flock($fh,LOCK_UN)                       or die($php_errormsg);
fclose($fh)                              or die($php_errormsg);
