<?php
function times_33_hash($str) {
   $h = 5381;
   for ($i = 0, $j = strlen($str); $i < $j; $i++) {
       // Shifting $h left by 5 bits is a quick way to multiply by 32
       $h += ($h << 5) + ord($str[$i]);
       // Only keep the lower 32 bits of $h
       $h = $h & 0xFFFFFFFF;
   }
   return $h;
}
