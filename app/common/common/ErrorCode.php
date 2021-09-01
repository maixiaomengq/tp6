<?php

/**
 * 预定义状态码
 * User: zhiliang
 * Date: 2021/3/13
 * Time: 14:58
 */
namespace app\common\common;

use think\facade\Request;

class ErrorCode
{
    //=============================系统公共状态码============================
    const SUCCESS = 1;                              // 成功状态
    const SYS_SYSTEM_ERROR = -1;                    // 系统异常
    const SYS_CHECK_ERROR = -2;                     // 校验错误
    const SYS_DB_ERROR = -3;                        // 数据库操作错误
    const SYS_ABOUT_DB_CONFIG_ERROR = -4;           // 数据相关配置错误
    const SYS_URL_ERROR = -100;                     // 路径错误
    const SYS_REQUEST_PARAMS_ERROR = -101;          // 参数错误
    const SYS_REQUEST_PARAMS_MISSING = -102;        // 缺少参数
    const SYS_LOGIN_INVALID = -200;                 // 登录态无效
    const SYS_NOT_POWER = -201;                     // 没有操作权限
    
    //============================ 通用业务状态码  ==============================================
    
    const MOBILE_VALIDATION_ERROR = -10001;          // 手机号格式验证错误
    const SMS_VERIFY_CODE_TYPE_ERROR = -10002;       // 短信验证码类型错误
    const SMS_VERIFY_CODE_PLATFORM_ERROR = -10003;   // 短信平台错误
    const SMS_VERIFY_CODE_MAX_LIMIT = -10004;        // 获取短信的次数超过上限，请明天再试
    const SMS_INFO_ERROR = -10005;                   // 短信信息错误
    const SMS_VERIFY_CODE_FREQUENTLY_SEND = -10006;  // 验证码发送频繁
    const SMS_SEND_VERIFY_CODE_ERROR = -10007;       // 发送验证码异常
    const PLEASE_GET_VERIFY_CODE = -10008;           // 请先获取验证码
    const SMS_VERIFY_CODE_BE_OVERDUE = -10009;       // 验证码已过期，请重新获取
    const SMS_VERIFY_CODE_ERROR = -10010;            // 验证码错误
    const DATE_TIME_ERROR = -10011;                  // 日期时间格式验证错误

    const UPLOAD_OVERFLOW = -500000;

    //状态码相对应信息
    public static $systemMessage = [
        //=============================系统公共信息===============================
        self::SUCCESS => 'ok',
        self::SYS_SYSTEM_ERROR  => '系统异常',
        self::SYS_CHECK_ERROR => '校验错误',
        self::SYS_DB_ERROR  => '数据库操作错误',
        self::SYS_URL_ERROR => '路径错误',
        self::SYS_REQUEST_PARAMS_ERROR => '参数错误',
        self::SYS_REQUEST_PARAMS_MISSING  => '缺少参数',
        self::SYS_ABOUT_DB_CONFIG_ERROR  => '数据相关配置错误',
        self::SYS_LOGIN_INVALID  => '登录态无效',
        self::SYS_NOT_POWER  => '没有操作权限',
	
	    self::MOBILE_VALIDATION_ERROR  => '手机号格式验证错误',
	    self::SMS_VERIFY_CODE_TYPE_ERROR  => '短信验证码类型错误',
	    self::SMS_VERIFY_CODE_PLATFORM_ERROR  => '短信平台错误',
	    self::SMS_VERIFY_CODE_MAX_LIMIT  => '获取短信的次数超过上限，请明天再试',
	    self::SMS_INFO_ERROR  => '短信信息错误',
	    self::SMS_VERIFY_CODE_FREQUENTLY_SEND  => '验证码发送频繁',
	    self::PLEASE_GET_VERIFY_CODE  => '请先获取验证码',
	    self::SMS_VERIFY_CODE_BE_OVERDUE  => '验证码已过期，请重新获取',
	    self::SMS_VERIFY_CODE_ERROR  => '验证码错误',
	    self::DATE_TIME_ERROR  => '日期时间格式验证错误',

        self::UPLOAD_OVERFLOW => '文件大小超过限制',

    ];

    // 自定义的错误信息放到该数组下，参考systemMessage
    public static $customMessage = [

    ];

    // 包括预定义与自定义的错误信息
    protected static $errorMessage = null;

    public static function getMessage($status)
    {
        static::initErrorMessage();

        return isset(static::$errorMessage[$status]) ? static::$errorMessage[$status] : static::$errorMessage[static::SYS_SYSTEM_ERROR];
    }

    private static function initErrorMessage()
    {
        if (!static::$errorMessage) {
            $error_code =  "api\\". app('http')->getName(). '\\Common\\ErrorCode';

            if (!class_exists($error_code)) {
                $error_code = static::class;
            }
            static::$errorMessage = static::$systemMessage + $error_code::$customMessage;
        }
    }
}