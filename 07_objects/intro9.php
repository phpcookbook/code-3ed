<?php
class DB {
 public $result;

 function getResult() {
  return $this->result;
 }

 function query($sql) {
  error_log("query() must be overridden by a database-specific child");
  return false;
 }
}

class MySQL extends DB {
 function query($sql) {
  $this->result = mysql_query($sql);
 }
}
