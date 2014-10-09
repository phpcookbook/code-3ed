<?php
$text = "Birthday: May 11, 1918.";
$when = DateTime::createFromFormat("*: F j, Y.|", $text);
// $formatted is "Saturday, 11-May-18 00:00:00 UTC"
$formatted = $when->format(DateTime::RFC850);
