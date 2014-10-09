<?php
// Act II. Scene II. 
$question = 'What a piece of work is man?';

$answers['answer'][] = 'Noble in reason';
$answers['votes'][]  = 29;

$answers['answer'][] = 'Infinite in faculty';
$answers['votes'][]  = 22;

$answers['answer'][] = 'In form, in moving, how express and admirable';
$answers['votes'][]  = 59;

$answers['answer'][] = 'In action how like an angel';
$answers['votes'][]  = 45;

bar_chart($question, $answers);
