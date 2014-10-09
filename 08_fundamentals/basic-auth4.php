<?php

/* replace with appropriate username and password checking,
    such as checking a database */
$users = array('david' => 'fadj&32',
               'adam'  => '8HEj838');
$realm = 'My website';
    
$username = validate_digest($realm, $users);

// Execution never reaches this point if invalid auth data is provided
print "Hello, " . htmlentities($username);

function validate_digest($realm, $users) {
    // Fail if no digest has been provided by the client
    if (! isset($_SERVER['PHP_AUTH_DIGEST'])) {
        send_digest($realm);
    }
    // Fail if digest can't be parsed
    $username = parse_digest($_SERVER['PHP_AUTH_DIGEST'], $realm, $users);
    if ($username === false) {
        send_digest($realm);
    }
    // Valid username was specified in the digest
    return $username;
}

function send_digest($realm) {
    http_response_code(401);
    $nonce = md5(uniqid());
    $opaque = md5($realm);
    header("WWW-Authenticate: Digest realm=\"$realm\" qop=\"auth\" ".
           "nonce=\"$nonce\" opaque=\"$opaque\"");
    echo "You need to enter a valid username and password.";
    exit;
}

function parse_digest($digest, $realm, $users) {
    // We need to find the following values in the digest header:
    // username, uri, qop, cnonce, nc, and response
    $digest_info = array();
    foreach (array('username','uri','nonce','cnonce','response') as $part) {
        // Delimiter can either be ' or " or nothing (for qop and nc)
        if (preg_match('/'.$part.'=([\'"]?)(.*?)\1/', $digest, $match)) {
            // The part was found, save it for calculation
            $digest_info[$part] = $match[2];
        } else {
            // If the part is missing, the digest can't be validated;
            return false;
        }
    }
    // Make sure the right qop has been provided
    if (preg_match('/qop=auth(,|$)/', $digest)) {
        $digest_info['qop'] = 'auth';
    } else {
        return false;
    }
    // Make sure a valid nonce count has been provided
    if (preg_match('/nc=([0-9a-f]{8})(,|$)/', $digest, $match)) {
        $digest_info['nc'] = $match[1];
    } else {
        return false;
    }
    
    // Now that all the necessary values have been slurped out of the
    // digest header, do the algorithmic computations necessary to 
    // make sure that the right information was provided.
    //
    // These calculations are described in sections 3.2.2, 3.2.2.1, 
    // and 3.2.2.2 of RFC 2617.
    // Algorithm is MD5
    $A1 = $digest_info['username'] . ':' . $realm . ':' . $users[$digest_info['username']];
    // qop is 'auth'
    $A2 = $_SERVER['REQUEST_METHOD'] . ':' . $digest_info['uri'];
    $request_digest = md5(implode(':', array(md5($A1), $digest_info['nonce'], $digest_info['nc'],
    $digest_info['cnonce'], $digest_info['qop'], md5($A2))));

    // Did what was sent match what we computed?
    if ($request_digest != $digest_info['response']) {
        return false;
    }
    
    // Everything's OK, return the username
    return $digest_info['username'];
}

