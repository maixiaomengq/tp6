<?php

/**
 * 预定义状态码
 * User: zhiliang
 * Date: 2021/3/13
 * Time: 14:58
 */
namespace app\api\common;

class ErrorCode extends \app\common\common\ErrorCode
{
    //=============================业务状态码============================
    const SUCCESS = 1;                                           // 成功状态

    //状态码相对应信息
    public static $customMessage = [
        //=============================业务信息===============================
        self::SUCCESS => 'ok',

    ];
}
