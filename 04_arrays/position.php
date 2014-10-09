<?php

$favorite_foods = array(1 => 'artichokes', 'bread', 'cauliflower', 
	                    'deviled eggs');
$food = 'cauliflower';
$position = array_search($food, $favorite_foods);

if ($position !== false) {
    echo "My #$position favorite food is $food";
} else {
    echo "Blech! I hate $food!";
}
