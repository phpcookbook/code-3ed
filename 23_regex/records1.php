<?php
$contents = file_get_contents('/path/to/your/file.txt');
$records = preg_split('/[0-9]+\) /', $contents);
