<?php

/**
 * Created by PhpStorm.
 * User: zhiliang.chen
 * Date: 2021/3/14
 * Time: 12:13
 */
declare (strict_types = 1);

namespace app\common\model;

use app\common\common\ErrorCode;
use think\Model;

class Base extends Model
{
    protected function throwException($errcode, $errmsg = '')
    {
        empty($errmsg) && $errmsg = ErrorCode::getMessage($errcode);
        throwCustomException($errmsg, $errcode);
    }
}