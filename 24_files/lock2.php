<?php
$fh = fopen('guestbook.txt','a')         or die($php_errormsg);
$tries = 3;
while ($tries > 0) {
    $locked = flock($fh,LOCK_EX | LOCK_NB);
    if (! $locked) {
        sleep(5);
        $tries--;
    } else {
        // don't go through the loop again 
        $tries = 0;
    }
}
if ($locked) {
    fwrite($fh,$_POST['guestbook_entry']) or die($php_errormsg);
    fflush($fh)                              or die($php_errormsg);
    flock($fh,LOCK_UN)                       or die($php_errormsg);
    fclose($fh)                              or die($php_errormsg);
} else {
    print "Can't get lock.";
}
