<?php
if ($_POST['temperature'] != strval(floatval($_POST['temperature']))) {
   print 'Your temperature must be a number.';
}