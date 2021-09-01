<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2021/9/1
 * Time: 10:10
 */
namespace app\admin\model;

class SysUser extends Base
{
    protected $connection = 'cartechpro';
    protected $table = 'sys_user';
    protected $pk = 'id';
}