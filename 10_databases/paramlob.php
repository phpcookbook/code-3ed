<?php
$st = $db->prepare('INSERT INTO files (path,contents) VALUES (:path,:contents)');
$st->bindParam(':path',$path);
$st->bindParam(':contents',$fp,PDO::PARAM_LOB);
foreach (glob('/usr/local/*') as $path) {
    // Get a filehandle that PDO::PARAM_LOB can work with
    $fp = fopen($path,'r');
    $st->execute();
}
