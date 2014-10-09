<?php
class shape {
    function draw() {
        // write to screen
    }
}

class circle extends shape {
   function draw($origin, $radius) {
      // validate data
      if ($radius > 0) {
          parent::draw();
          return true;
      }

      return false;
   }
}
