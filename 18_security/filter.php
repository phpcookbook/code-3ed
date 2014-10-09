<?php
$filters = array('name' => array('filter' => FILTER_VALIDATE_REGEXP,
                                 'options' => array('regexp' => '/^[a-z]+$/i')),
                 'age' => array('filter' => FILTER_VALIDATE_INT,
                                'options' => array('min_range' => 13)));

$clean = filter_input_array(INPUT_POST, $filters);
