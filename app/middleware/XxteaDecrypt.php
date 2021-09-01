<?php
/**
 * Created by PhpStorm.
 * User: zhiliang.chen
 * Date: 2021/3/16
 * Time: 14:59
 */

namespace app\middleware;

require_once base_path(). 'common/common/XXTEA.php';

class XxteaDecrypt
{
    use \app\common\traits\ApiRequest;

    public function handle($request, \Closure $next)
    {
        $post_param = file_get_contents('php://input');

        $this->printLog('base64Str', ['base64Str' => $post_param]);

        if (strtolower($request->method()) == 'post') {
            if (config('app.on_xxtea')) {
                $destr      = base64_decode($post_param);
                $post_param = xxtea_decrypt($destr, config("app.xxtea_key"));
                unset($destr);
            }
        }

        $request->decrypt_status = ($post_param) ? true : false;
        $request->decrypt_data = json_decode($post_param, true);

        $this->printLog('request', $request->decrypt_data);

        return $next($request);
    }
}