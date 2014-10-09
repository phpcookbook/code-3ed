<?php
$fh = fopen('c:/alligator/crocodile menu.txt','r') or die($php_errormsg);
while(false !== ($s = fgets($fh))) {
    print $s;
}
fclose($fh)                                        or die($php_errormsg);
