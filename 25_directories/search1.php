<?php
class SiteSearch {
    public $bodyRegex = '';
    protected $seen = array();
    
    public function searchDir($dir) {
        // array to hold pages that match
        $pages = array();

        // array to hold directories to recurse into
        $dirs = array();

        // mark this directory as seen so we don't look in it again
        $this->seen[realpath($dir)] = true;
    
        try {
            foreach (new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($dir)) as $file) {
                if ($file->isFile() && $file->isReadable() &&
                (! isset($this->seen[$file->getPathname()]))) {
                    // mark this as seen so we skip it
                    // if we come to it again
                    $this->seen[$file->getPathname()] = true;
                    
                    // load the contents of the file into $text
                    $text = file_get_contents($file->getPathname());

                    // if the search term is inside the body delimiters
                    if (preg_match($this->bodyRegex,$text)) {

                    // construct the relative URI of the file by removing
                    // the document root from the full path
                    $uri = substr_replace($file->getPathname(),'',0,strlen
                    ($_SERVER['DOCUMENT_ROOT']));

                    // if the page has a title, find it
                    if (preg_match('#<title>(.*?)</title>#Sis',$text,$match)) {
                        // and add the title and URI to $pages
                        array_push($pages,array($uri,$match[1]));
                    } else {
                        // otherwise use the URI as the title
                        array_push($pages,array($uri,$uri));
                    }
                }
                }
            }
        } catch (Exception $e) {
            // There was a problem opening the directory
        }
        return $pages;
    }
}

// helper function to sort matched pages alphabetically by title
function by_title($a,$b) {
        return ($a[1] == $b[1]) ?
               strcmp($a[0],$b[0]) :
               ($a[1] > $b[1]);
}

// SiteSearch object to do the searching
$search = new SiteSearch();

// array to hold the pages that match the search term
$matching_pages = array();
// directories underneath the document root to search
$search_dirs = array('sports','movies','food');
// regular expression to use in searching files. The "S" pattern
// modifier tells the PCRE engine to "study" the regex for greater
// efficiency.
$search->bodyRegex = '#<body>(.*' . preg_quote($_GET['term'],'#'). 
                     '.*)</body>#Sis';

// add the files that match in each directory to $matching pages
foreach ($search_dirs as $dir) {
    $matching_pages = array_merge($matching_pages,
                                  $search->searchDir($_SERVER['DOCUMENT_ROOT'].'/'.$dir));
}

if (count($matching_pages)) {
    // sort the matching pages by title
    usort($matching_pages,'by_title');
    print '<ul>';
    // print out each title with a link to the page
    foreach ($matching_pages as $k => $v) {
        print sprintf('<li> <a href="%s">%s</a>',$v[0],$v[1]);
    }
    print '</ul>';
} else {
    print 'No pages found.';
}
?>
