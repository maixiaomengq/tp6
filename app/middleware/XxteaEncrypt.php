<?php
/**
 * Created by PhpStorm.
 * User: zhiliang.chen
 * Date: 2021/3/16
 * Time: 14:59
 */

declare (strict_types = 1);

namespace app\middleware;

use think\Response;

require_once base_path(). 'common/common/XXTEA.php';

class XxteaEncrypt
{

    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure       $next
     * @return Response
     */
    public function handle($request, \Closure $next)
    {
    	$response = $next($request);

    	$content = $response->getContent();

        if (config('app.on_xxtea')) {
            $result = base64_encode(xxtea_encrypt($content, config('app.xxtea_key')));
        } else {
            $result = $content;
        }

    	return response($result);
    }
}