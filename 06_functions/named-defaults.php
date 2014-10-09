<?php
function image($img) {
    if (! isset($img['src']))    { $img['src']    = 'cow.png';      }
    if (! isset($img['alt']))    { $img['alt']    = 'milk factory'; }
    if (! isset($img['height'])) { $img['height'] = 100;            }
    if (! isset($img['width']))  { $img['width']  = 50;             }
    /* ... */
}
