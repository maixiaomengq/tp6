<?php
/**
 * Created by PhpStorm.
 * User: zhiliang.chen
 * Date: 2021/3/23
 * Time: 17:32
 */

namespace app\middleware;

class FilterHtml
{
    public function handle($request, \Closure $next)
    {
        $post_param = $request->decrypt_data;

        filterHtmlspecialchars($post_param);

        return $next($request);
    }
}