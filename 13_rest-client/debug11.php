<?php
class HeaderSaver {
    public $headers = array();
    public $code = null;   

    public function header($curl, $data){
        if (is_null($this->code) &&
            preg_match('@^HTTP/\d\.\d (\d+) @',$data,$matches)) {
            $this->code = $matches[1];
        } else {
            // Remove the trailing newline
            $trimmed = rtrim($data);
            if (strlen($trimmed)) {
                // If this line begins with a space or tab, it's a 
                // continuation of the previous header
                if (($trimmed[0] == ' ') || ($trimmed[0] == "\t")) {
                    // Collapse the leading whitespace into one space
                    $trimmed = preg_replace('@^[ \t]+@',' ', $trimmed);
                    $this->headers[count($this->headers)-1] .= $trimmed;
                } 
                // Otherwise, it's a new header
                else {
                    $this->headers[] = $trimmed;
                }
            }
        }
        return strlen($data);
    }
    
}

$h = new HeaderSaver();
$c = curl_init('http://www.example.com/plankton.php');
// Register the header function
curl_setopt($c, CURLOPT_HEADERFUNCTION, array($h,'header'));
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
$page = curl_exec($c);
// Now $h is populated with data
print 'The response code was: ' . $h->code . "\n";
print "The response headers were: \n";
foreach ($h->headers as $header) {
    print "  $header\n";
}
