<?php
function array_sort($array, $map_func, $sort_func = '') {
    $mapped = array_map($map_func, $array);    // cache $map_func() values

    if ('' === $sort_func) { 
        asort($mapped);                        // asort() is faster then usort()
    }  else { 
        uasort($mapped, $sort_func);           // need to preserve keys
    }

    while (list($key) = each($mapped)) {
        $sorted[] = $array[$key];              // use sorted keys
    }

    return $sorted;
}
