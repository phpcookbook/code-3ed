<?php
$name = 'Kurt Gödel';
$dinner = '불고기';

$name_lower = preg_match_all('/\p{Ll}/u',$name,$match);
$dinner_lower = preg_match_all('/\p{Ll}/u',$dinner,$match);

print "There are $name_lower lowercase letters in $name.\n";
print "There are $dinner_lower lowercase letters in $dinner.\n";
