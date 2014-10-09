<?php
$fh = fopen('message.txt','r+')         or die($php_errormsg);

// figure out how many bytes to read
$bytes_to_read = filesize('message.txt');

// initialize variables that hold file positions
$next_read = $last_write = 0;

// keep going while there are still bytes to read
while ($next_read < $bytes_to_read) {
    
    /* move to the position of the next read, read a line, and save
     * the position of the next read */
    fseek($fh,$next_read);
    $s = fgets($fh)                     or die($php_errormsg);
    $next_read = ftell($fh);

    // convert <b>word</b> to *word*
    $s = preg_replace('@<b[^>]*>(.*?)</b>@i','*$1*',$s);
    // convert <i>word</i> to /word/ 
    $s = preg_replace('@<i[^>]*>(.*?)</i>@i','/$1/',$s);

    /* move to the position where the last write ended, write the
     * converted line, and save the position for the next write */
    fseek($fh,$last_write);
    if (-1 == fwrite($fh,$s))            { die($php_errormsg); }
    $last_write = ftell($fh);
}
  
// truncate the file length to what we've already written 
ftruncate($fh,$last_write)              or die($php_errormsg);

// close the file
fclose($fh)                             or die($php_errormsg);
