<?php

function img($locale, $f) {
    static $image_base_path = '/usr/local/www/images';
    static $image_base_url  = '/images';

    if (is_readable("$image_base_path/$locale/$f")) {
        return "$image_base_url/$locale/$f";
    } elseif (is_readable("$image_base_path/global/$f")) {
        return "$image_base_url/global/$f";
    } else {
        error_log("l10n error: locale: $locale, image: '$f'");
    }
}
