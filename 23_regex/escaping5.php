<?php
$search_term = preg_quote($_GET['search_term'],'/');
if (preg_match("/\b$search_term/i",$s)) {
   print 'match!';
}
