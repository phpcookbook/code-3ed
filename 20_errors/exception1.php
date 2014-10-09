<?php
try {
  // do something
  $obj = new CoolThing();
} catch (CustomException $e) {
  // at this point, the CoolThing wasn't cool
  print $e;
}
