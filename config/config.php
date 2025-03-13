<?php


return [
    // 默认发送配置
    'default' => "feieyun",
    // 可用的网关配置
    'clients' => [
        "feieyun" => [
            "type" => 'feieyun',
            'user' => "",
            'ukey' => "",
        ],
        'jolimark' => [
            "type" => 'jolimark',
            'app_id' => "",
            'app_key' => "",
        ],
        // 需要自己setRequestUrl传入url
        'kuaidi100' => [
            "type" => 'kuaidi100',
            'key' => "",
            'secret' => "",
        ],
        'poscom' => [
            "type" => 'poscom',
            'memberCode' => "",
            'apiKey' => "",
        ],
        'ushengyun' => [
            "type" => 'ushengyun',
            'appId' => "",
            'appSecret' => "",
        ],
        'xpyun' => [
            "type" => 'xpyun',
            "user" => "",
            "userKey" => "",
        ],
        'yilianyun' => [
            "type" => 'yilianyun',
            'client_id' => "",
            'client_secret' => "",
        ],
        'zhongwuyun2' => [
            "type" => 'zhongwuyun',
            'appid' => "",
            'appsecret' => "",
        ],
    ],
];