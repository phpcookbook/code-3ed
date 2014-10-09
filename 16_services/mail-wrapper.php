<?php
function mail_wrapper($to, $subject, $body, $headers) {
    mail($to, $subject, $body, $headers);
    error_log("[MAIL][TO: $to]");
}
