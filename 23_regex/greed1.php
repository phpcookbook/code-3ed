<?php
// find all <em>emphasized</em> sections
preg_match_all('@<em>.+?</em>@', $html, $matches);
