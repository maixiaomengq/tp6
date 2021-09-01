<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2021/3/13
 * Time: 16:49
 */

return [
    // 应用调试模式
    'app_debug'  => false,

    // 是否开启xxtea加密
    'on_xxtea'   => true,
    'xxtea_key'  => "bIJy-8>9mA?.kGVp",

    // 日志存储路径
    'log_file_url' => "/data/spannerlogs/api_php_online/api_php_online_",

    // 短信配置
    'sms_key'       => 'hycartechpro',  // 短信接口key
    'sms_secret'    => '1adb41ca62d3912957b605a5194db016',     // 短信密钥
    'sms_endpoint'  => 'http://api.sms.corp.flamingo-inc.com/sms_api/send',   // 短信接口

    'ys_cartechpro_product_id' => 161,  // 优胜汽修大师产品ID

];