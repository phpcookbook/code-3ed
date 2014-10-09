<?php
// Destructor
class Database {
    function __destruct() {
         db_close($this->handle); // close the database connection
    }
}
