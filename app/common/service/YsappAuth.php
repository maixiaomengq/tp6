<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2021/3/14
 * Time: 12:13
 */

namespace app\common\service;

class YsappAuth extends Base
{
    private static $redis;

    public static function getYsappLoginTokenRedis()
    {
        if (self::$redis) {
            return self::$redis;
        }

        $config = config('database')['connections']['cartechpro_login_token'];
        $redis  = new \Redis();
        $redis->connect($config['host'], $config['port']);
        $redis->select($config['name']);
        self::$redis = $redis;
        return $redis;
    }

    public static function checkLogin($data) {
        $uid        = $data['user_info']['uid'];
        $token      = $data['user_info']['login_token'];
        $product_id = $data['package_info']['product_id'];

        $key = self::getLoginKey($product_id, $uid, $token);
        if (!self::isValidLoginKey($key)) {
            return false;
        }

        $userInfo = self::getYsappLoginTokenRedis()->hGetAll($key);
        $userInfo['login_token'] = $token;

        return $userInfo;
    }

    // 拼接redis登录态的key
    public static function getLoginKey($product_id, $uid, $token){
        return "{$product_id}:uid:{$uid}_{$token}";
    }

    public static function isValidLoginKey($key)
    {
        if (!$key) {
            return false;
        }

        $redis = self::getYsappLoginTokenRedis();
        if ($redis->exists($key)) {
            return true;
        }else{
            return false;
        }
    }

}