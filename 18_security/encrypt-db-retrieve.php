<?php

$row = $db->query('SELECT *
                    FROM   noc_list
                    WHERE  id = 27')->fetch();
$plaintext = mcrypt_decrypt($row['algorithm'],
                            $_POST['key'],
                            $row['data'],
                            $row['mode'],
                            $row['iv']);
