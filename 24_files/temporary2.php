<?php
$tempfilename = tempnam('/tmp', 'data-');
$temp_fh = fopen($tempfilename, 'w') or die($php_errormsg);
fputs($temp_fh, "The current time is ".strftime('%c'));
fclose($temp_fh)                    or die($php_errormsg);
