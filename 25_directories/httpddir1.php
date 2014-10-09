<?php

/* Bit masks for determining file permissions and type. The names and values
 * listed below are POSIX-compliant; individual systems may have their own 
 * extensions.
 */

define('S_IFMT',0170000);   // mask for all types 
define('S_IFSOCK',0140000); // type: socket 
define('S_IFLNK',0120000);  // type: symbolic link 
define('S_IFREG',0100000);  // type: regular file 
define('S_IFBLK',0060000);  // type: block device 
define('S_IFDIR',0040000);  // type: directory 
define('S_IFCHR',0020000);  // type: character device 
define('S_IFIFO',0010000);  // type: fifo 
define('S_ISUID',0004000);  // set-uid bit 
define('S_ISGID',0002000);  // set-gid bit 
define('S_ISVTX',0001000);  // sticky bit 
define('S_IRWXU',00700);    // mask for owner permissions 
define('S_IRUSR',00400);    // owner: read permission 
define('S_IWUSR',00200);    // owner: write permission 
define('S_IXUSR',00100);    // owner: execute permission 
define('S_IRWXG',00070);    // mask for group permissions 
define('S_IRGRP',00040);    // group: read permission 
define('S_IWGRP',00020);    // group: write permission 
define('S_IXGRP',00010);    // group: execute permission 
define('S_IRWXO',00007);    // mask for others permissions 
define('S_IROTH',00004);    // others: read permission 
define('S_IWOTH',00002);    // others: write permission 
define('S_IXOTH',00001);    // others: execute permission 

/* mode_string() is a helper function that takes an octal mode and returns
 * a 10-character string representing the file type and permissions that
 * correspond to the octal mode. This is a PHP version of the mode_string()
 * function in the GNU fileutils package.
 */
$mode_type_map = array(S_IFBLK => 'b', S_IFCHR => 'c',
                       S_IFDIR => 'd', S_IFREG => '-',
                       S_IFIFO => 'p', S_IFLNK => 'l',
                       S_IFSOCK => 's');
function mode_string($mode) {
    global $mode_type_map;
    $s = '';
    $mode_type = $mode & S_IFMT;
    // Add the type character
    $s .= isset($mode_type_map[$mode_type]) ?
          $mode_type_map[$mode_type] : '?';
  
  // set user permissions 
  $s .= $mode & S_IRUSR ? 'r' : '-';
  $s .= $mode & S_IWUSR ? 'w' : '-';
  $s .= $mode & S_IXUSR ? 'x' : '-';

  // set group permissions 
  $s .= $mode & S_IRGRP ? 'r' : '-';
  $s .= $mode & S_IWGRP ? 'w' : '-';
  $s .= $mode & S_IXGRP ? 'x' : '-';

  // set other permissions 
  $s .= $mode & S_IROTH ? 'r' : '-';
  $s .= $mode & S_IWOTH ? 'w' : '-';
  $s .= $mode & S_IXOTH ? 'x' : '-';

  // adjust execute letters for set-uid, set-gid, and sticky 
  if ($mode & S_ISUID) {
      // 'S' for set-uid but not executable by owner 
      $s[3] = ($s[3] == 'x') ? 's' : 'S';
  }

  if ($mode & S_ISGID) {
      // 'S' for set-gid but not executable by group 
      $s[6] = ($s[6] == 'x') ? 's' : 'S';
  }

  if ($mode & S_ISVTX) {
      // 'T' for sticky but not executable by others 
      $s[9] = ($s[9] == 'x') ? 't' : 'T';
  }
  
  return $s;
}

// start at the document root if not specified
$dir = isset($_GET['dir']) ? $_GET['dir'] : '';

// locate $dir in the filesystem
$real_dir = realpath($_SERVER['DOCUMENT_ROOT'].$dir);
// Passing document root through realpath resolves any
// forward-slash vs. backslash issues
$real_docroot = realpath($_SERVER['DOCUMENT_ROOT']);

// make sure $real_dir is inside document root
if (! (($real_dir == $real_docroot) ||
       ((strlen($real_dir) > strlen($real_docroot)) &&
        (strncasecmp($real_dir,$real_docroot.DIRECTORY_SEPARATOR,
        strlen($real_docroot.DIRECTORY_SEPARATOR)) == 0)))) {
    die("$dir is not inside the document root");
}

// canonicalize $dir by removing the document root from its beginning 
$dir = substr($real_dir,strlen($real_docroot)+1);

// are we opening a directory?
if (! is_dir($real_dir)) {
    die("$real_dir is not a directory");
}

print '<pre><table>';

// read each entry in the directory 
foreach (new DirectoryIterator($real_dir) as $file) {
    // translate uid into user name
    if (function_exists('posix_getpwuid')) {
        $user_info = posix_getpwuid($file->getOwner());
    } else {
        $user_info = $file->getOwner();
    }

    // translate gid into group name 
    if (function_exists('posix_getgrid')) {
        $group_info = $file->getGroup();
    } else {
        $group_info = $file->getGroup();
    }

    // format the date for readability 
    $date = date('M d H:i',$file->getMTime());

    // translate the octal mode into a readable string 
    $mode = mode_string($file->getPerms());

    $mode_type = substr($mode,0,1);
    if (($mode_type == 'c') || ($mode_type == 'b')) {
        /* if it's a block or character device, print out the major and
         * minor device type instead of the file size */
        $statInfo = lstat($file->getPathname());
        $major = ($statInfo['rdev'] >> 8) & 0xff;
        $minor = $statInfo['rdev'] & 0xff;
        $size = sprintf('%3u, %3u',$major,$minor);
    } else {
        $size = $file->getSize();
    }

    // format the <a href=""> around the filename
    // no link for the current directory
    if ('.' == $file->getFilename()) {
        $href = $file->getFilename();
    } else {
        // don't include the ".." in the parent directory link
        if ('..' == $file->getFilename()) {
            $href = urlencode(dirname($dir));
        } else {
            $href = urlencode($dir) . '/' . urlencode($file);
        }
        
        /* everything but "/" should be urlencoded */
        $href = str_replace('%2F','/',$href);

        // browse other directories with web-ls
        if ($file->isDir()) {
            $href = sprintf('<a href="%s?dir=/%s">%s</a>',
                            $_SERVER['PHP_SELF'],$href,$file);
        } else {
            // link to files to download them
            $href= sprintf('<a href="%s">%s</a>',$href,$file);
        }

        // if it's a link, show the link target, too
        if ('l' == $mode_type) {
            $href .= ' -&gt; ' . readlink($file->getPathname());
        }
    }

    // print out the appropriate info for this file 
    printf('<tr><td>%s</td><td align="right">%s</td>
            <td align="right">%s</td><td align="right">%s</td>
            <td align="right">%s</td><td>%s</td></tr>',
           $mode,                // formatted mode string 
           $user_info['name'],   // owner's user name 
           $group_info['name'],  // group name 
           $size,                // file size (or device numbers) 
           $date,                // last modified date and time 
           $href);               // link to browse or download 
}

print '</table></pre>';
