<?php
foreach ($fruits as $color => $color_fruit) {
    // $color_fruit is an array
    foreach ($color_fruit as $fruit) {
        print "$fruit is colored $color.<br>";
    }
}
