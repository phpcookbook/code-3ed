<?php
header('WWW-Authenticate: Basic realm="http://server.example.com/"');
header('WWW-Authenticate: OAuth realm="http://server.example.com/"', true);