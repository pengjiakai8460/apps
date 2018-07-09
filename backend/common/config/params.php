<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    //阿里OSS
    'oss' => [
    	'accessKeyId' => 'LTAI8CqhZVcMYcpA',
    	'accessKeySecret' => 'gXAnCG6F0eA2rKjgJJPrLkzQtwXhVI',
    	'bucket' => 'pjk',
    	'host' => 'http://post-test.oss-cn-hangzhou.aliyuncs.com',
    	'endpoint' => 'vpc100-oss-cn-shanghai.aliyuncs.com',
    ],
    //阿里大于
    'code' => [
        'accessKey' => 'df5198a51e7eeedc9f530a6f65ca1eb1',
        'sms' => 'SMS_66040051',
        'sign' => '彭佳凯',
        'appId' => '23797715',
        'product' => '佳凯之家'
    ],
    //支付宝扫码支付
    'aliWebPay' => [
        //应用ID,您的APPID。
        'app_id' => "2018012702088946",
        //商户私钥，您的原始格式RSA私钥
        'merchant_private_key' => "MIIEpAIBAAKCAQEA4k2fY3u7UKay/EvnTyssg987AzQZ3teRcVVYXAB9/P9zT2DzsQ4WlOrmZ48VsoKeIJ2+ReZbC9a/yYzJMUQUBP1eAMB5q3b9MvToK0Jd+H0dgpjA90xC7CttOnq43AAmNoPLs/0o5LRtz8vtcFpXlt3M3OOj/udmd2D9qjtoJ5M3F/F6Ce5Qe+B9BICCfUs1wJEbLl3lE8HtP7vXGJDM7K/loEby7hkH98oaTO7sgt6ADfmNdnrX8Up1gG4a8zdFlX2AtcfIt0fWFNjtMAHdobntD2LESaNDuxng7pr+3fJMh0xqvgxvfXbZ7nRRU+495zz/GVa84rNJbxm4GcqaSwIDAQABAoIBAQDa7lFmgwtiKQM7RYtPcess4MdMgBkPFulkBTboOqmoGtHJV3gqMAD0rJOeWDSbb/Xeg/zRztsCBw2fxQ3XFY9wjFVm0M5kbUbjBz+cqiYTAaeM8o6sMCEGLbUMQDGa1KIjVzm4tQ/cwhkCUL0yVpQqJgXNJIVBU0gz8ac2CybmMJnoP/KIWv2D5TVTx3WnZDtlXNDAweAQEJIlGe98JbmCATK8jT9d0O7VfKj2+xhpyJhy4rfmWv0ygKJ4xcfJ3jQgkIBtctohWa8o/7oaozrR80teDsIZOuCDzx08gIKMWvvPHrsZkG6jqxPJJl9gCWHmUuk0nEixIi2412SMTy1RAoGBAPXmp8n6LGpmum6S02/Kl9LT50fRZr83vPPmhbDkTsy2TVIPH0sAgryBmmhrvVI1mwJ0xUTj1s8/ADrckM4G8+45F7Mli5KW7hJeDnvPmVJqegX3Kl3ttRS2OW/Ac3p3mNRWgA3wIWv4wlQtiBhTnUaYKINj6nEjJGndb4NO6IZ3AoGBAOuY67XkDAH6z8obBfQrXVjrrWT/ZICclYxMgi1iBDuqP7Qg1V4OvmMEHU4iElx7DCHnXKIkNI/sB7c25r0JLmjhrjYqPK53Sq+BqKaVlHG1cb01uC1YsC5tQOQgu+ZBMjruBztQc5nmK0ISgihS4n58Mb4VMSE9zmZDcxf9ErvNAoGBAOQw7MoZN7hxplZQOJgISEXkUT8rSo7uWZF4/d1+sMV182DQGbkPO0NVfgWi3ah5iGSKGjpouIHQNBVrc5FNkHYkUyLzF4esOjefQw+QQfbiSmRYzt8lZSJYTAqxbDhc3d1GfETy7wD0ctmM+zuf9FZ7gzUSto/RDcyUKhSPWGbXAoGAGrPmY2NJiR/oVTvi3N3dYqqzqHLZ7UnSGWjCiGpHmIufVMcz58k8AvUAbU6nThwUL/ONKEN6QaW66iUq2dokjHanzDPVVODociP7/YWOoaSzE4L3MQyQS3LOnAypv1s8WjmIUEy6DYNs+7wlTHS4fyWMbcLxIpdiwWx7qwhgCzECgYAlrFTdULBfQspyvhr3ut6DCe3eFYjKutGLdircE0Pb//u9SW1FnHnw27/hnB8QUYaeuI7/d76LgYiGt51vUPvTb4/qQkJ+AO9GTHwa3iH65gn2ZMBbWs9A1HE7PpBqyzVcXF/GUmsoYDrdUf0qphR7sSKE43oZRLZrPMXbtPL3ng==",
        //异步通知地址
        'notify_url' => "http://www.yufuschool.com/index.php/order/pay/alipay-notify",
        //同步跳转
        'return_url' => "http://www.yufuschool.com/index.php/order/pay/success",
        //编码格式
        'charset' => "UTF-8",
        //签名方式
        'sign_type' => "RSA2",
        //支付宝网关
        'gatewayUrl' => "https://openapi.alipay.com/gateway.do",
        //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
        'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAk0QbwnzUCX6RCIyfdxmGcA+sixQCx6G1lFd9xcRM3mzjL5kjQwIjrktYGbBwD8IZBgO2gPbY7YlhPu7hIb5bZF0spZubFE40YxiE8zY5ZEV8hUF2RrgVUb3kxGH94t6u3vQZX2ayk4iH5fA0qhADuccc/ARCrKj8fBuR6mntQ5n2OuKO7AtEPpfDGiUJLLfFlBF4YYxqTZMYiAKEgbrA9uYpKJx6fI36aM133jlGUFe6K38CPo3eekk/8zaU0P/dwa1Q3+mBAaSMEqNGgMAGBojUX/d/Cz4i/qvbzsF8Owx8nX737mqmhpwx3Zntevm80dE9HuM3V8Rieyx1nOoZCQIDAQAB"
    ],
    'mail' => [
        'host'=>'smtp.163.com',
        'username'=>'13545383720@163.com',
        'password'=>'wocao13545383720',
        'port'=>'25',
        'encryption'=>'tls',
    ]
];
