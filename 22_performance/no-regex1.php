<?php
if (!preg_match('/^[a-z0-9]*$/i', $username)) {
  echo 'please enter a valid username.';
}