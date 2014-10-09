<form action='<?= htmlentities($_SERVER['SCRIPT_NAME']) ?>' method='post'>
<dl>
<dt>Your Name:</dt>
<?php if (isset($errors['name'])) { ?>
  <dd class="error"><?= htmlentities($errors['name']) ?></dd>
<?php } ?>
<dd><input type='text' name='name'
     value='<?= htmlentities($defaults['name']) ?>'/></dd>
<dt>Are you over 18 years old?</dt>
<?php if (isset($errors['age'])) { ?>
  <dd class="error"><?= htmlentities($errors['age']) ?></dd>
<?php } ?>
<dd><input type='checkbox' name='age' value='1' <?= $defaults['age'] ?>/> Yes</dd>
<dt>Your favorite ice cream flavor:</dt>
<?php if (isset($errors['flavor'])) { ?>
  <dd class="error"><?= htmlentities($errors['flavor']) ?></dd>
<?php } ?>
<dd><select name='flavor'>
<?php foreach ($flavors as $flavor) { ?>
<option <?= isset($defaults['flavor'][$flavor]) ?
            $defaults['flavor'][$flavor] :
            "" ?>><?= htmlentities($flavor) ?></option>
<?php } ?>
</select></dd>
</dl>
<input type='submit' value='Send Info'/>
</form>
