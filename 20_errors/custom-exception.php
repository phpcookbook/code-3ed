<?php
class CustomException extends Exception {
    public function __construct($e) {
        // make sure everything is assigned properly
        parent::__construct($e->getMessage(), $e->getCode());

        // log what we know
        $msg = "------------------------------------------------\n";
        $msg .= __CLASS__ . ": [{$this->code}]: {$this->message}\n";
        $msg .= $e->getTraceAsString() . "\n";
        error_log($msg);
    }

    // overload the __toString() method to suppress any "normal" output
    public function __toString() {
        return $this->printMessage();
    }

    // map error codes to output messages or templates
    public function printMessage() {

        $usermsg = '';
        $code = $this->getCode();

        switch ($code) {
        case SOME_DEFINED_ERROR_CODE:
            $usermsg = 'Ooops! Sorry about that.';
            break;
        case OTHER_DEFINED_ERROR_CODE:
            $usermsg = "Drat!";
            break;
        default:
            $usermsg = file_get_contents('/templates/general_error.html');
            break;
        }
        return $usermsg;
    }

    // static exception_handler for default exception handling
    public static function exception_handler($exception) {
        throw new CustomException($exception);
    }

}

// make sure to catch every exception
set_exception_handler('CustomException::exception_handler');

try {
    $obj = new CoolThirdPartyPackage();
} catch (CustomException $e) {
    echo $e;
}
