<?php
declare (strict_types = 1);

namespace app\common\traits;

use app\common\common\ErrorCode;

trait ApiRequest
{
    /**
     * 输出成功状态并返回数据
     *
     * @param $data
     *
     * @return mixed
     */
    public function response($data = null)
    {
        $response_data = [];
        $response_data['errcode'] = ErrorCode::SUCCESS;
        $response_data['errmsg']  = ErrorCode::getMessage(ErrorCode::SUCCESS);
        $response_data['result'] = $data;

        // 写入日志
        $this->printLog('response',$response_data);

        return json($response_data);
    }

    /**
     * 输出错误提示,
     * 若未传$errcode则默认会返回系统错误提示
     *
     * @param int $errcode 错误码
     * @param string $error_message 错误消息
     * @param array $data
     *
     * @return mixed
     */
    public function fail($errcode = ErrorCode::SYS_SYSTEM_ERROR, $error_message = "", $data = null)
    {
        if (is_array($error_message)) {
            $msg_arr = $error_message;
            $error_message = ErrorCode::getMessage($errcode);
            foreach ($msg_arr as $search => $msg) {
                $error_message = str_replace(':' . $search, $msg, $error_message);
            }
        }

        $response_data = [];
        $response_data['errcode'] = $errcode;
        $response_data['errmsg'] = !empty($error_message) ? $error_message : ErrorCode::getMessage($errcode);
        $response_data['result'] = $data;

        $this->printLog('response', $response_data);

        // 若为数据库操作错误，则返回错误消息需转换成自定义的消息输出
        ($errcode == ErrorCode::SYS_DB_ERROR) && $response_data['errmsg'] = ErrorCode::getMessage(ErrorCode::SYS_DB_ERROR);

        return json($response_data);
    }

    // 打印日志
    public function printLog($type = 'unknow', $data)
    {
        $ymd = date("Ymd");
        $filename = config('app.log_file_url'). app('http')->getName() . "_{$ymd}.log";

        if(!is_array($data)){ $data = array($data); }

        //敏感信息屏蔽
        (isset($data['password']) && $data['password']) && $data['password']   = '******';
        (isset($data['repassword']) && $data['repassword']) && $data['repassword'] = '******';
        (isset($data['new_password']) && $data['new_password']) && $data['new_password'] = '******';

        $row = [
            request()->ip(),
            date("Y-m-d H:i:s"),
            "[{$type}]",
            request()->pathinfo(),
            json_encode($data, JSON_UNESCAPED_UNICODE)
        ];

        $line = implode("\t",$row);
        file_put_contents($filename, $line."\r\n",LOCK_EX|FILE_APPEND);
    }
}