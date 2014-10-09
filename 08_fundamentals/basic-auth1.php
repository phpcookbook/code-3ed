<?php
http_response_code(401);
header('WWW-Authenticate: Basic realm="My Website"');
echo "You need to enter a valid username and password.";
exit();
