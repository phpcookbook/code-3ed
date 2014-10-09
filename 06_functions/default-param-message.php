<?php

function log_db_error($message = NULL) {
    if (is_null($message)) {
        $message = "Couldn't connect to DB";
    }

    error_log("[DB] [$message]");
}
