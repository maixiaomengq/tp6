<?php
namespace app\common\exception;

use think\Exception;

class BaseException extends Exception {
    public $errcode;
    public $errmsg;

    public function __construct($errmsg, $errcode) {
    	$this->errcode = $errcode;
    	$this->errmsg  = $errmsg;

        parent::__construct($errmsg, $errcode);
    }
}