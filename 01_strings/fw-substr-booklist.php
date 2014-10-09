<?php
function fixed_width_substr($fields,$data) {
  $r = array();
  for ($i = 0, $j = count($data); $i < $j; $i++) {
    $line_pos = 0;
    foreach($fields as $field_name => $field_length) {
      $r[$i][$field_name] = rtrim(substr($data[$i],$line_pos,$field_length));
      $line_pos += $field_length;
    }
  }
  return $r;
}

$book_fields = array('title' => 25,
                     'author' => 15,
                     'publication_year' => 4);

$book_array = fixed_width_substr($book_fields,$booklist);
