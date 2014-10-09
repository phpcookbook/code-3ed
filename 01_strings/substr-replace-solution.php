<?php

// Everything from position $start to the end of $old_string
// becomes $new_substring
$new_string = substr_replace($old_string,$new_substring,$start);

// $length characters, starting at position $start, become $new_substring
$new_string = substr_replace($old_string,$new_substring,$start,$length);
