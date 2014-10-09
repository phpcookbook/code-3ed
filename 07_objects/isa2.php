<?php
$media = get_something_from_catalog();
if ($media instanceof Book) {
  // do bookish things
} else if ($media instanceof DVD) {
  // watch the movie
}
