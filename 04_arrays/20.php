<?php
foreach ($fruits as $color => $color_fruit) {
    print "$color colored fruits include " . 
        array_to_comma_string($color_fruit) . "<br>";
}
