<?php
$dumpdir = '/tmp';
$processid = posix_getpid();
ini_set('apd.dumpdir', $dumpdir);

// Prepare to output a basic report
$dumpfile = $dumpdir . '/pprof.' . $processid . '.0';

// Start the trace
apd_set_pprof_trace();

// Functions that we will profile
function pc_longString() {
    return uniqid(php_uname('a'), true);
}

function pc_md5($str) {
    return md5($str);
}

function pc_mhashmd5($str) {
    return bin2hex(mhash(MHASH_MD5, $str));
}

function pc_hashmd5($str) {
    return hash('md5', $str);
}

// Run the functions
$str = pc_longString();

$md5 = function_exists('md5') ? pc_md5($str) : false;
$md5 = function_exists('mhash') ? pc_mhashmd5($str) : false;
$md5 = function_exists('hash') ? pc_hashmd5($str) : false;

echo "now run:\n";
echo "  /usr/bin/pprofp -R $dumpfile\n";
echo "to view a report.\n";
