<?php
/**
 * Created by PhpStorm.
 * User: zhiliang.chen
 * Date: 2021/3/16
 * Time: 14:59
 */

namespace app\middleware;

class CrossDomain
{
    use \app\common\traits\ApiRequest;

    public function handle($request, \Closure $next)
    {
        date_default_timezone_set('PRC');

        //设置跨域
        header("Access-Control-Allow-Origin:*");
        header("Access-Control-Allow-Methods:GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers:Origin, X-Requested-With, Content-Type, Accept, Authorization");
        if ('OPTIONS' == $request->method()) {
            header("HTTP/1.1 200 OK");
            exit;
        }

        return $next($request);
    }

}