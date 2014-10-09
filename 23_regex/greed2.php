<?php
// find all <em>emphasized</em> sections
preg_match_all('@<em>.+</em>@U', $html, $matches);
