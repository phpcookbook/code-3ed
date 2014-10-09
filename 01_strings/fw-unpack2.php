<?php

function fixed_width_unpack($format_string,$data) {
  $r = array();
  for ($i = 0, $j = count($data); $i < $j; $i++) {
    $r[$i] = unpack($format_string,$data[$i]);
  }
  return $r;
}

$book_array = fixed_width_unpack('A25title/A15author/A4publication_year',
                                    $booklist);
