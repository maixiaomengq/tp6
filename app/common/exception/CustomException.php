<?php
namespace app\common\exception;

use think\Exception;

class CustomException extends BaseException {
    public function __construct($errmsg, $errcode) {
        parent::__construct($errmsg, $errcode);
    }
}