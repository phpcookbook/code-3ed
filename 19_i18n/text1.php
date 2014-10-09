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


foreach (array('en_US', 'en_GB') as $locale) {
    $candy = new MessageFormatter($locale, $messages[$locale]['CANDY']);
    $favs = new MessageFormatter($locale, $messages[$locale]['FAVORITE_FOODS']);
    print $favs->format(array($candy->format(array()))) . "\n";
}