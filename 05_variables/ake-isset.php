<?php
$vehicles = array('cars' => null);
// array_key_exists() returns TRUE because the key is present.
$ake_result = array_key_exists('cars', $vehicles);

// isset() returns values because the key's value is NULL
$isset_result = isset($vehicles['cars']);
