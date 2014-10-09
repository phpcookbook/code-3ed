<?php
$fixed = tidy_repair_file('bad.html');
file_put_contents('good.html', $fixed);
