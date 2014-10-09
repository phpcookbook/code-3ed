<?php
$base = '/usr/local/php-include';
$locale = 'en_US';

$include_path = ini_get('include_path');
ini_set('include_path',"$base/$locale:$base/global:$include_path");
