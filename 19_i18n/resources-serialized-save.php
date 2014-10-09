<?php
$messages = array();
$messages['en_US'] =
    array('FAVORITE_FOODS' => 'My favorite food is {0}.',
          'FRIES' => 'french fries',
          'CANDY' => 'candy',
          'CHIPS' => 'potato chips',
          'EGGPLANT' => 'eggplant');
$messages['en_GB'] =
    array('FAVORITE_FOODS' => 'My favourite food is {0}.',
          'FRIES' => 'chips',
          'CANDY' => 'sweets',
          'CHIPS' => 'crisps',
          'EGGPLANT' => 'aubergine');

foreach ($messages as $locale => $entries) {
    file_put_contents(__DIR__ . "/$locale.ser", serialize($entries));
}
