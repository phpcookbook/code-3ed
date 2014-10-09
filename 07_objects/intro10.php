<?php
function escape($sql) {
 $safe_sql = mysql_real_escape_string($sql); // escape special characters
 $safe_sql = parent::escape($safe_sql); // parent method adds '' around $sql
 return $safe_sql;
}
