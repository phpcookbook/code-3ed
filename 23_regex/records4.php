<?php
$records = preg_split('/[0-9]+\) /', str_replace("\n",'',$contents));
array_shift($records);
