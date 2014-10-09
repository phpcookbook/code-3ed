<?php
// The file where build_query() is defined
include __DIR__ . '/buildquery.php';

$db = new PDO('sqlite:/tmp/zodiac.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$fields = array('sign','symbol','planet','element',
                'start_month','start_day','end_month','end_day');

$cmd = isset($_REQUEST['cmd']) ? $_REQUEST['cmd'] : 'show';

switch ($cmd) {
 case 'edit':
 try {
    $st = $db->prepare('SELECT ' . implode(',',$fields) .
                       ' FROM zodiac WHERE id = ?');
    $st->execute(array($_GET['id']));
    $row = $st->fetch(PDO::FETCH_ASSOC);
 } catch (Exception $e) {
     $row = array();
 }
 case 'add':
     print '<form method="post" action="' .
           htmlentities($_SERVER['PHP_SELF']) . '">';
     print '<input type="hidden" name="cmd" value="save">';
     print '<table>';
     if ('edit' == $cmd) {
         printf('<input type="hidden" name="id" value="%d">',
                $_GET['id']);
     }
     foreach ($fields as $field) {
         if ('edit' == $cmd) {
             $value = htmlentities($row[$field]);
         } else {
             $value = '';
         }
         printf('<tr><td>%s: </td><td><input type="text" name="%s" value="%s">',
                $field,$field,$value);
         printf('</td></tr>');
     }
     print '<tr><td></td><td><input type="submit" value="Save"></td></tr>';
     print '</table></form>';
     break;
 case 'save':
     try {
       $st = build_query($db,'id',$fields,'zodiac');
       print 'Added info.';
     } catch (Exception $e) {
       print "Couldn't add info: " . htmlentities($e->getMessage());
     }
     print '<hr>';
 case 'show':
 default:
     $self = htmlentities($_SERVER['PHP_SELF']);
     print '<ul>';
     foreach ($db->query('SELECT id,sign FROM zodiac') as $row) {
         printf('<li> <a href="%s?cmd=edit&id=%s">%s</a>',
                $self,$row['id'],htmlentities($row['sign']));
     }
     print '<hr><li> <a href="'.$self.'?cmd=add">Add New</a>';
     print '</ul>';
     break;
}
