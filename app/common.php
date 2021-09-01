<?php
// 应用公共文件

// 抛出自定义异常
function throwCustomException(int $errcode, string $errmsg)
{
    exception($errmsg, $errcode, 'app\\common\\exception\\CustomException');
}

// 验证手机号码
function is_mobile($mobile)
{
    return preg_match("/^1[1-9]{1}[0-9]{9}$/", $mobile);
}

// 验证是否为时间格式
function is_date_time($dateTime){
    $ret = strtotime($dateTime);
    return $ret !== FALSE && $ret != -1;
}

// htmlspecialchars过滤html字符
function filterHtmlspecialchars(&$data)
{
    if (!$data || is_numeric($data)) {
        return;
    }

    if (!is_array($data) && !is_object($data)) {
        $data = htmlspecialchars($data);
    } else {
        foreach ($data as &$value) {
            if (!is_array($value) && !is_object($value) && !is_numeric($value)) {
                $value = htmlspecialchars($value);
            } else {
                filterHtmlspecialchars($value);
            }
        }
    }
}

function curlPost($url, $query=[], $data=[], $json=false, $https=false) {
    if (!is_string($query)) {
        $query = http_build_query($query);
    }
    if (!is_string($data)) {
        if ($json) {
            $data = json_encode($data);
        } else {
            $data = http_build_query($data);
        }
    }

    $ch = curl_init();
    if ($query) {
        curl_setopt($ch, CURLOPT_URL, $url . '?' . $query);
    } else {
        curl_setopt($ch, CURLOPT_URL, $url);
    }
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    if ($json) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    }
    if ($https) {
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    }

    $result = curl_exec($ch);

    return $result;
}
