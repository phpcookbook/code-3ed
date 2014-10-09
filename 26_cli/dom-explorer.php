<?php
/* Need to specify a URL on the commandline */
isset($argv[1]) or die("No URL specified");

/* Load the HTML and start the command loop */
$explorer = new DomExplorer($argv[1]);
$explorer->loop();

class DomExplorer {

    public function __construct($url) {
        $html = file_get_contents($url);
        if (false === $html) {
            throw new Exception("Can't retrieve $url");
        }
        /* Turn the HTML into valid XHTML */
        $clean = tidy_repair_string($html, array('output-xhtml' => true));

        /* Load it into a DOMDocument, hiding any libxml
         * warnings */
        $this->doc = new DOMDocument();
        libxml_use_internal_errors(true);
        if (false === $this->doc->loadHtml($clean)) {
            throw new Exception("Can't parse {$url} as HTML");
        }
        libxml_use_internal_errors(false);
        $this->currentNode = $this->doc->documentElement;
        $this->x = new DOMXPath($this->doc);
    }

    public function loop() {
        /* The "completion" function will provide tab-completion at the prompt */
        readline_completion_function(array($this, 'completion'));
        while (true) {
            /* Use the current node as part of the prompt */
            $line = readline($this->currentNode->getNodePath() . ' > ');
            readline_add_history($line);

            /* The first word typed in is the command, the rest are arguments */
            $parts = explode(' ', $line);
            $cmd = array_shift($parts);

            /* Each command is a method, so call it if it exists */
            $cmd_function_name = "cmd_$cmd";
            if (is_callable(array($this, $cmd_function_name))) {
                try {
                    $this->$cmd_function_name($parts);
                } catch (Exception $e) {
                    print $e->getMessage() . "\n";
                }
            }
            else {
                print "Unknown Command: $line\n";
            }
        }
    }

    /**
     * Command: exit the program
     */
    protected function cmd_exit($args) {
        exit();
    }

    /**
     * Command: list all nodes under the current node or
     * a specified node
     */
    protected function cmd_ls($args) {
        if (isset($args[0]) && strlen($args[0])) {
            $node = $this->resolvePath($args[0]);
        }
        else {
            $node = $this->currentNode;
        }
        print implode(' ' , $this->getChildNodePaths($node)) . "\n";
    }

    /**
     * Command: change to a new current node
     */
    protected function cmd_cd($args) {
        /* If an argument is provided, use it */
        if (isset($args[0]) && strlen($args[0])) {
            $this->currentNode = $this->resolvePath($args[0]);
        }
        /* Otherwise go back to the "root" */
        else {
            $this->currentNode = $this->doc->documentElement;
        }
    }

    /**
     * Command: print the text content of a node
     */
    protected function cmd_cat($args) {
        if (isset($args[0]) && strlen($args[0])) {
            $node = $this->resolvePath($args[0]);
            print $node->textContent . "\n";
        }
        else {
            throw new Exception("cat requires an argument");
        }
    }

    /**
     * Get all the paths of the nodes under the provided
     * node, trimming off the path of the current node from
     * the paths of the child nodes
     */
    protected function getChildNodePaths($node) {
        $children = array();
        $curdir = $node->getNodePath();
        foreach ($node->childNodes as $node) {
            $path = $node->getNodePath();
            $sub = substr($path, strlen($curdir) + 1);
            $children[] = $sub;
        }
        return $children;
    }

    /**
     * When tab is pressed, return an array of child
     * node paths as possible completion targets
     */
    protected function completion($str, $index) {
        return $this->getChildNodePaths($this->currentNode);
    }

    /**
     * Resolve an xpath expression relative to the current
     * node, and make sure it only matches 1 target node
     */
    protected function resolvePath($arg) {
        $matches = $this->x->query($arg, $this->currentNode);
        if ($matches === false) {
            throw new Exception("Bad expresion: $arg");
        }
        if ($matches->length == 0) {
            throw new Exception("No match for $arg");
        }
        if ($matches->length > 1) {
            throw new Exception("{$matches->length} matches for arg");
        }
        return $matches->item(0);
    }

}
