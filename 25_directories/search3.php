<?php
$search->bodyRegex = '#<!-- search-start -->(.*' . preg_quote($_GET['term'],'#'). 
              '.*)<!-- search-end -->#Sis';
