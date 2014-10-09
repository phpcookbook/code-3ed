<?php
if ($_POST['rating'] != strval(intval($_POST['rating']))) {
   print 'Your rating must be an integer.';
}