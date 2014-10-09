<form method="post" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>"
      onsubmit="document.getElementById('submit-button').disabled = true;">
<!-- insert all the normal form elements you need -->
<input type='hidden' name='token' value='<?= md5(uniqid()) ?>'/>
<input type='submit' value='Save Data' id='submit-button'/>
</form>