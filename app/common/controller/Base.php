<?php
/**
 * Created by PhpStorm.
 * User: zhiliang.chen
 * Date: 2021/3/14
 * Time: 12:12
 */

namespace app\common\controller;

use app\BaseController;
use app\common\common\ErrorCode;
use think\Container;
use think\Request;
use think\facade\Cache;
use think\app;

class Base extends BaseController
{
    use \app\common\traits\ApiRequest;
    protected $requestData;
    protected $userInfo;

    protected function throwException($errcode, $errmsg = '')
    {
        empty($errmsg) && $errmsg = ErrorCode::getMessage($errcode);
        throwCustomException($errcode, $errmsg);
    }

    public function __construct()
    {
        parent::__construct();


//  \think\Db::listen(function ($sql, $time, $explain) {
//      if (count(explode('SHOW', $sql)) === 1) {
//          echo $sql . '<br><br>'. "\n";
//      }
//  });

        $this->userInfo = $this->request->middleware('decrypt_data')['user_info'];
        $this->requestData = $this->request->middleware('decrypt_data')['data'] ?? [];

    }
}
