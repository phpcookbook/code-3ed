<form action='<?= htmlentities($_SERVER['SCRIPT_NAME']) ?>' method='post'>

Favorite Color: <input type='text' name='color'/> <br/>
Favorite Food:  <input type='text' name='food'/> <br/>

<input type='hidden' name='stage' value='<?= $stage + 1 ?>'/>
<input type='submit' value='Done'/>