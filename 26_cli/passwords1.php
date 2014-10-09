<?php
// turn off echo
`/bin/stty -echo`;

// read password
$password = trim(fgets(STDIN));

// turn echo back on
`/bin/stty echo`;
