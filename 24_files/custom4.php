<?php
/** Stream wrapper */
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'ViewStream.php';

/**
 * A very dumb template class just to demonstrate the concept.
 * 
 * @author Mike Naberezny
 * @link   http://mikenaberezny.com/archives/40
 * @link   http://phpsavant.com
 */
class IdiotSavant {
    public function __construct() {
        if (!in_array('view', stream_get_wrappers())) {
            stream_wrapper_register('view', 'ViewStream');
        }
    }
    
    public function render($filename) {
        include 'view://' . dirname(__FILE__) . DIRECTORY_SEPARATOR . $filename . '.html';
    }
}

// Create a new view
$view = new IdiotSavant();

// Assign the variable "hello" to the scope of the view
$view->hello = 'Hello, World!';

// Render the view from a template.  Outputs "<html> Hello, World! </html>"
$view->render('ExampleTemplate');
