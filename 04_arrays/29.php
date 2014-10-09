<?php
foreach ($items as $item => $cost) {
    if (! in_stock($item)) { 
        unset($items[$item]);           // address the array directly
    }
}
