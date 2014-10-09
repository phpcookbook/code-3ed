<?php
class PageSaver {
    protected $db;
    protected $page ='';
    
    public function __construct() {
        $this->db = new PDO('sqlite:./pages.db');
    }
    
    public function write($curl, $data) {
        $this->page .= $data;
        return strlen($data);
    }
    
    public function save($curl) {
        $info = curl_getinfo($curl);
        $st = $this->db->prepare('INSERT INTO pages '.
                           '(url,page) VALUES (?,?)');
        $st->execute(array($info['url'], $this->page));
    }
}

// Create the saver instance
$pageSaver = new PageSaver();
// Create the cURL resources
$c = curl_init('http://www.example.com/');
// Set the write function
curl_setopt($c, CURLOPT_WRITEFUNCTION, array($pageSaver,'write'));
// Execute the request
curl_exec($c);
// Save the accumulate data
$pageSaver->save($c);
