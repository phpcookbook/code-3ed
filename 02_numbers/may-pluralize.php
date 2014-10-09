<?php
function may_pluralize($singular_word, $amount_of) {

    // array of special plurals
    $plurals = array(
        'fish' => 'fish',
        'person' => 'people',
    );

    // only one
    if (1 == $amount_of) {
        return $singular_word;
    }

    // more than one, special plural
    if (isset($plurals[$singular_word])) {
        return $plurals[$singular_word];
    }

    // more than one, standard plural: add 's' to end of word
    return $singular_word . 's';
}