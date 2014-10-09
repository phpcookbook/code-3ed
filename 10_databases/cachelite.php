<?php
require_once 'Cache/Lite.php';

$opts = array(
   // Where to put the cached data
   'cacheDir' => '/tmp/',
   // Let us store arrays in the cache
  'automaticSerialization' => true,
  // How long stuff lives in the cache
  'lifeTime' => 600 /* ten minutes */);              

// Create the cache  
$cache = new Cache_Lite($opts);

// Connect to the database
$db = new PDO('sqlite:/tmp/zodiac.db');

// Define our query and its parameters
$sql = 'SELECT * FROM zodiac WHERE planet = ?';
$params = array($_GET['planet']);

// Get the unique cache key
$key = cache_key($sql, $params);

// Try to get results from the cache
$results = $cache->get($key);

if ($results === false) {
    // No results found, so do the query and put the results in the cache
    $st = $db->prepare($sql);
    $st->execute($params);
    $results = $st->fetchAll();
    $cache->save($results);
}

// Whether from the cache or not, $results has our data
foreach ($results as $result) {
    print "$result[id]: $result[planet], $result[sign] <br/>\n";
}
    
function cache_key($sql, $params) {
    return md5($sql .
               implode('|',array_keys($params)) .
               implode('|',$params));
}
