<?php
error_reporting(E_ALL);                // everything
error_reporting(E_ERROR | E_PARSE);    // only major problems
error_reporting(E_ALL & ~E_NOTICE);    // everything but notices
