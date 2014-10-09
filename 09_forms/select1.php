<?php
// Generating the menu
$choices = array('Eggs','Toast','Coffee');
echo "<select name='food'>\n";
foreach ($choices as $choice) {
   echo "<option>$choice</option>\n";
}
echo "</select>";

// Then, later, validating the menu
if (! in_array($_POST['food'], $choices)) {
    echo "You must select a valid choice.";
}
