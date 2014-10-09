<?php

function must_be_an_array(array $fruits) {
    foreach ($fruits as $fruit) {
        print "$fruit\n";
    }
}

function array_or_null_is_ok(array $fruits = null) {
    if (is_array($fruits)) {
        foreach ($fruits as $fruit) {
            print "$fruit\n";
        }
    }
}
