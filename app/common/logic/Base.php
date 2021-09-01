<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2021/3/14
 * Time: 12:13
 */
namespace app\common\logic;

class Base
{
    use \app\common\traits\ApiRequest;
    protected $requestData;
    protected $userInfo;

    public function __construct()
    {
        $this->userInfo = request()->middleware('decrypt_data')['user_info'];
        $this->requestData = request()->middleware('decrypt_data')['data'] ?? [];

    }

}