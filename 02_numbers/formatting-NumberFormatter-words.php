<?php
$number = '1234.56';

$france = new \NumberFormatter("fr-FR", NumberFormatter::SPELLOUT);
// $formatted is "mille-deux-cent-trente-quatre virgule cinq six"
$formatted = $france->format($number);
