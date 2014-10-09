<?php
print htmlentities($rasmus);                   // bad
print htmlentities($rasmus->__toString());    // good
