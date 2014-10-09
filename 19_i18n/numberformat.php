$args = array(7,159,-0.3782,6.815574);

$sci = new NumberFormatter('en_US', NumberFormatter::SCIENTIFIC);
$dur = new NumberFormatter('en_US', NumberFormatter::DURATION);
$ord = new NumberFormatter('en_US', NumberFormatter::ORDINAL);
$pat = new NumberFormatter('en_US', NumberFormatter::PATTERN_DECIMAL, '@@@@');

print $sci->format(10040)    . "\n";
print $dur->format(64)       . "\n";
print $ord->format(15)       . "\n";
print $pat->format(1.357926) . "\n";
