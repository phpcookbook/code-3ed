<?php

if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
    $localeToUse = Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']);
}
else {
    $localeToUse = Locale::getDefault();
}
