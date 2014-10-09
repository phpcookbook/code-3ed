<?php
class pc_Shm {

    protected $tmp;

    public function __construct($tmp = '') {
        if (!function_exists('shmop_open')) {
            trigger_error('pc_Shm: shmop extension is required.', E_USER_ERROR);
            return;
        }

        if ($tmp != '' && is_dir($tmp) && is_writable($tmp)) {
            $this->tmp = $tmp;
        } else {
            $this->tmp = '/tmp';
        }
    }

    public function read($id, $size) {
        $shm = $this->open($id, $size);
        $data = shmop_read($shm, 0, $size);
        $this->close($shm);
        if (!$data) {
            trigger_error('pc_Shm: could not read from shared memory block', E_USER_ERROR);
            return false;
        }
        return $data;
    }


    public function write($id, $size, $data) {
        $shm = $this->open($id, $size);
        $written = shmop_write($shm, $data, 0);
        $this->close($shm);
        if ($written != strlen($data)) {
            trigger_error('pc_Shm: could not write entire length of data', E_USER_ERROR);
            return false;
        }
        return true;
    }


    public function delete($id, $size) {
        $shm = $this->open($id, $size);
        if (shmop_delete($shm)) {
            $keyfile = $this->getKeyFile($id);
            if (file_exists($keyfile)) {
                unlink($keyfile);
            }
        }
        return true;
    }

    protected function open($id, $size) {
        $key = $this->getKey($id);
        $shm = shmop_open($key, 'c', 0644, $size);
        if (!$shm) {
            trigger_error('pc_Shm: could not create shared memory segment', E_USER_ERROR);
            return false;
        }
        return $shm;
    }

    protected function close($shm) {
        return shmop_close($shm);
    }

    protected function getKey($id) {
        $keyfile = $this->getKeyFile($id);
        if (! file_exists($keyfile)) {
            touch($keyfile);
        }
        return ftok($keyfile, 'R');
    }

    protected function getKeyFile($id) {
        return $this->tmp . DIRECTORY_SEPARATOR . 'pcshm_' . $id;
    }
}
