<?php
// combine() adds numbers, concatenates strings, merges arrays,
// and ANDs bitwise and boolean arguments
function combine($a, $b) {
    if (is_int($a) && is_int($b))     {
        return $a + $b;
    }

    if (is_float($a) && is_float($b))   {
        return $a + $b;
    }

    if (is_string($a) && is_string($b))  {
        return "$a$b";
    }

    if (is_array($a) && is_array($b))   {
        return array_merge($a, $b);
    }

    if (is_bool($a) && is_bool($b))    {
        return $a & $b;
    }

    return false;
}
