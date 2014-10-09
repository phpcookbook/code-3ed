<?php
$words = array('Малина', 'Клубника', 'Огурец');
$collator = new Collator('ru_RU');
// Sorts in-place, just like sort()
$collator->sort($words);
