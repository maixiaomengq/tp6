<?php

return [
    // 默认使用的数据库连接配置
    'default'         => env('database.driver', 'mysql'),

    // 自定义时间查询规则
    'time_query_rule' => [],

    // 自动写入时间戳字段
    // true为自动识别类型 false关闭
    // 字符串则明确指定时间字段类型 支持 int timestamp datetime date
    'auto_timestamp'  => false,

    // 时间字段取出后的默认时间格式
    'datetime_format' => 'Y-m-d H:i:s',

    // 时间字段配置 配置格式：create_time,update_time
    'datetime_field'  => '',

    // 数据库连接配置信息
    'connections'     => [
        'mysql' => [
            // 数据库类型
            'type'            => env('database.type', 'mysql'),
            // 服务器地址
            'hostname'        => env('database.hostname', '127.0.0.1'),
            // 数据库名
            'database'        => env('database.database', ''),
            // 用户名
            'username'        => env('database.username', 'root'),
            // 密码
            'password'        => env('database.password', ''),
            // 端口
            'hostport'        => env('database.hostport', '3306'),
            // 数据库连接参数
            'params'          => [],
            // 数据库编码默认采用utf8
            'charset'         => env('database.charset', 'utf8'),
            // 数据库表前缀
            'prefix'          => env('database.prefix', ''),

            // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
            'deploy'          => 0,
            // 数据库读写是否分离 主从式有效
            'rw_separate'     => false,
            // 读写分离后 主服务器数量
            'master_num'      => 1,
            // 指定从服务器序号
            'slave_no'        => '',
            // 是否严格检查字段是否存在
            'fields_strict'   => true,
            // 是否需要断线重连
            'break_reconnect' => false,
            // 监听SQL
            'trigger_sql'     => env('app_debug', true),
            // 开启字段缓存
            'fields_cache'    => false,
        ],

        // 更多的数据库配置信息

        // 优胜数据库
        'cartechpro'    =>    [
            // 数据库类型
            'type'        => 'mysql',
            // 服务器地址
            'hostname'    => 'pdatbiz51.rmz.flamingo-inc.com',
            // 数据库名
            'database'    => 'cartechpro_online',
            // 数据库用户名
            'username'    => 'carpro_online',
            // 数据库密码
            'password'    => '41f27cc6f3875d04',
            // 数据库连接端口
            'hostport'    => '3306',
            // 数据库连接参数
            'params'      => [],
            // 数据库编码默认采用utf8
            'charset'     => 'utf8',
            // 数据库表前缀
            'prefix'      => '',
        ],

        // 激活宝数据库
        'hycar'    =>    [
            // 数据库类型
            'type'        => 'mysql',
            // 服务器地址
            'hostname'    => 'pdatbiz21.rmz.flamingo-inc.com',
            // 数据库名
            'database'    => 'hycar_online',
            // 数据库用户名
            'username'    => 'hycar',
            // 数据库密码
            'password'    => '6h4WWGdPwv4uJQc9',
            // 数据库连接端口
            'hostport'    => '3306',
            // 数据库连接参数
            'params'      => [],
            // 数据库编码默认采用utf8
            'charset'     => 'utf8',
            // 数据库表前缀
            'prefix'      => '',
        ],

        // 优胜mongo数据库
        'cartechpro_mongo'    =>    [
            // 数据库类型
            'type'        => 'mongo',
            // 服务器地址
            'hostname'    => 'pdatbiz23.rmz.flamingo-inc.com',
            // 数据库名
            'database'    => 'cartechpro_online',
            // 数据库用户名
            'username'    => 'flamingo',
            // 数据库密码
            'password'    => 'flamingodatabase',
            // 数据库连接端口
            'hostport'    => '27017',
            // 数据库连接参数
            'params'      => [],
            // 数据库编码默认采用utf8
            'charset'     => 'utf8',
            // 数据库表前缀
            'prefix'      => '',
        ],

        // 优胜登录态（APP+后台）
        'cartechpro_login_token' => [
            'type'  => 'redis',
            'host'  => 'pdatbiz51.rmz.flamingo-inc.com',
            'port'  => '6379',
            'pwd'   => '',
            'name'  => '1',
        ],

        // 验证码
        'cartechpro_sms_code' => [
            'type'  => 'redis',
            'host'  => 'pdatbiz51.rmz.flamingo-inc.com',
            'port'  => '6379',
            'pwd'   => '',
            'name'  => '3',
        ],
    ],
];
