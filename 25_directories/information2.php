<?php
$file_info = stat('/tmp/session.txt');
$permissions = base_convert($file_info['mode'],10,8);
