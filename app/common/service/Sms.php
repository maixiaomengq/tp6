<?php
/**
 * 短信相关服务
 * User: zhiliang.chen
 * Date: 2021/6/21
 * Time: 17:00
 */

namespace app\common\service;

class Sms extends Base
{
    private static $redis;

    public static function getVerifyCodeRedis()
    {
        if (self::$redis) {
            return self::$redis;
        }

        $config = config('app.database.cartechpro_sms_code');
        $redis  = new \Redis();
        $redis->connect($config['host'], $config['port']);
        $redis->select($config['name']);
        self::$redis = $redis;
        return $redis;
    }

    // 短信验证码类型集合
    const SMS_VERIFY_CODE_MAP = [
        "customer_login",
    ];

    // 短信平台集合
    const SMS_PLATFORM_MAP = [
        "customer_platform"
    ];

    // 短信验证码模板
    const SMS_VERIFY_CODE_TEMPLATE = "【优胜汽修大师】您的验证码是：{code}，该验证码{time}分钟内有效，请勿向他人泄露！";

    /**
     * 发送手机号码
     *
     * @param string $phone 手机号码
     * @param string $content 短信内容
     * @param array $add_data 接收数据
     * @return mixed
     */
    public static function sendSms($phone, $content, &$add_data = [])
    {
        $data = array(
            't'       => time(),
            'key'     => config('app.sms_key'),
            'sign'    => '',
            'phones'  => $phone,
            'content' => $content,
            'type'    => 1
        );
        $data['sign'] = self::createVerify($data, config('app.sms_secret'));
        $result = curlPost(config('app.sms_endpoint'), [], $data);
        $result = json_decode($result, true);

        //接收短信返回状态码
        $add_data['return_code'] = $result['code'];
        if (isset($result['code'])) {
            return $result;
        } else {
            return false;
        }
    }

    /**
     * 算法规则
     * 先将所有请求的参数和值进行排序，再组成字符串，再与秘钥组成新字符串，再MD5生成签名sign值
     * @param array $request 请求参数
     * @param string $secret 加密key
     * @return mixed
     */
    protected static function createVerify($request, $secret)
    {
        ksort($request); //将所有的数组参数key => value ，按照键名从低到高进行排序
        $result = '';
        foreach ($request as $key => $value) {
            if ($key == 'sign') {
                continue;
            }
            $result .= $value;
        }
        $result .= $secret; //获取秘钥并且组成新字符串
        $result = md5($result);

        return $result;
    }
}