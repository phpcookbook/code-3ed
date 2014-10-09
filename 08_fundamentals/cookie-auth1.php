<?php
$secret_word = 'if i ate spinach';
if (validate($_POST['username'],$_POST['password'])) {
    setcookie('login', 
              $_POST['username'].','.md5($_POST['username'].$secret_word));
}
