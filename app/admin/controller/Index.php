<?php
declare (strict_types = 1);

namespace app\admin\controller;

use app\admin\model\SysUser;
use app\common\service\YsappAuth;
use think\facade\Config;

class Index extends Base
{
    public function __construct()
    {
        parent::__construct();
    }

    public function indexAction()
    {
        return '您好！这是一个[admin]示例应用';
    }

    public function testAction()
    {
        // 抛出异常
//        throwCustomException(1, "错误的");

        $data = ['name' => 'thinkphp', 'status' => '234234234'];
        return $this->response($data);
    }


}
