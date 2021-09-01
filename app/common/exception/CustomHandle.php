<?php
namespace app\common\exception;

use Exception;
use think\exception\Handle;
use app\common\exception\BaseException;
use think\Response;
use Throwable;

require_once base_path(). 'common/common/XXTEA.php';

class CustomHandle extends Handle
{
    use \app\common\traits\ApiRequest;

    public function render($request, Throwable $e): Response
    {
        if ($e instanceof BaseException) {
            $responseJson = $this->fail($e->errcode, $e->errmsg);

            if (config('on_xxtea')) {
                $result = base64_encode(xxtea_encrypt($responseJson->getContent(), config('xxtea_key')));
            } else {
                $result = $responseJson->getContent();
            }

            return response($result);
        }

        // 其他错误交给系统处理
        return parent::render($request, $e);
    }

}