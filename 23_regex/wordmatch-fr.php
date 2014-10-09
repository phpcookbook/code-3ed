<?php

$fr = 'Toc, toc. Qui est là? R2D2!';
$fr_words = preg_match_all('/\w+/u', $fr, $matches);
print "The French words are:\n\t";
print implode(', ', $matches[0]) . "\n";

$kr = '노크, 노크. 거기 누구입니까? R2D2!';
$kr_words = preg_match_all('/\w+/u', $kr, $matches);
print "The Korean words are:\n\t";
print implode(', ', $matches[0]) . "\n";
