<?php
/**
 * Stream wrapper to convert markup of mostly PHP templates into PHP prior to include().
 * 
 * Based in large part on the example at
 * http://www.php.net/manual/en/function.stream-wrapper-register.php
 * 
 * @author Mike Naberezny (@link http://mikenaberezny.com)
 * @author Paul M. Jones  (@link http://paul-m-jones.com)
 */
class ViewStream {
    /**
     * Current stream position.
     *
     * @var int
     */
    private $pos = 0;

    /**
     * Data for streaming.
     *
     * @var string
     */
    private $data;

    /**
     * Stream stats.
     *
     * @var array
     */
    private $stat;

    
    /**
     * Opens the script file and converts markup.
     */
    public function stream_open($path, $mode, $options, &$opened_path) {
        
        // get the view script source
        $path = str_replace('view://', '', $path);
        $this->data = file_get_contents($path);
        
        /**
         * If reading the file failed, update our local stat store
         * to reflect the real stat of the file, then return on failure
         */
        if ($this->data===false) {
            $this->stat = stat($path);
            return false;
        }

        /**
         * Convert <?= ?> to long-form <?php echo ?>
         * 
         * We could also convert <%= like the real T_OPEN_TAG_WITH_ECHO
         * but that's not necessary.
         * 
         * It might be nice to also convert PHP code blocks <? ?> but 
         * let's quit while we're ahead.  It's probably better to keep 
         * the <?php for larger code blocks but that's your choice.  If
         * you do go for it, explicitly check for <?xml as this will
         * probably be the biggest headache.
         */
        if (! ini_get('short_open_tag')) {
            $find = '/\<\?\= (.*)? \?>/';
            $replace = "<?php echo \$1 ?>";
            $this->data = preg_replace($find, $replace, $this->data);
        }
                
        /**
         * Convert @$ to $this->
         * 
         * We could make a better effort at only finding @$ between <?php ?>
         * but that's probably not necessary as @$ doesn't occur much in the wild
         * and there's a significant performance gain by using str_replace().
         */
        $this->data = str_replace('@$', '$this->', $this->data);
        
        /**
         * file_get_contents() won't update PHP's stat cache, so performing
         * another stat() on it will hit the filesystem again.  Since the file
         * has been successfully read, avoid this and just fake the stat
         * so include() is happy.
         */
        $this->stat = array('mode' => 0100777,
                            'size' => strlen($this->data));

        return true;
    }

    
    /**
     * Reads from the stream.
     */
    public function stream_read($count) {
        $ret = substr($this->data, $this->pos, $count);
        $this->pos += strlen($ret);
        return $ret;
    }

    
    /**
     * Tells the current position in the stream.
     */
    public function stream_tell() {
        return $this->pos;
    }

    
    /**
     * Tells if we are at the end of the stream.
     */
    public function stream_eof() {
        return $this->pos >= strlen($this->data);
    }

    
    /**
     * Stream statistics.
     */
    public function stream_stat() {
        return $this->stat;
    }

    
    /**
     * Seek to a specific point in the stream.
     */
    public function stream_seek($offset, $whence) {
        switch ($whence) {
            case SEEK_SET:
                if ($offset < strlen($this->data) && $offset >= 0) {
                $this->pos = $offset;
                    return true;
                } else {
                    return false;
                }
                break;

            case SEEK_CUR:
                if ($offset >= 0) {
                    $this->pos += $offset;
                    return true;
                } else {
                    return false;
                }
                break;

            case SEEK_END:
                if (strlen($this->data) + $offset >= 0) {
                    $this->pos = strlen($this->data) + $offset;
                    return true;
                } else {
                    return false;
                }
                break;

            default:
                return false;
        }
    }
}
