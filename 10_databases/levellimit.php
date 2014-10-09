<?php
$st = $this->db->query(
    "SELECT * FROM message WHERE level <= 1 ORDER BY thread_id,thread_pos");
while ($row = $st->fetch()) {
    // display each message
}
