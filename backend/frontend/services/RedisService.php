<?php

namespace frontend\services;

use Yii;
use yii\base\BaseObject;
use common\base\BaseService;
use yii\redis;

/**
 * Redis服务层
 * @author LXX
 */
class RedisService extends BaseService
{

    /**
     * 设置key-value
     * @param $key
     * @param string $value
     * @param string $time
     * @return bool
     */
    public static function setKey($key, $value = "", $time = "")
    {
        if (is_array($key)) return Yii::$app->redis->mset($key);
        return Yii::$app->redis->set($key, $value, $time);
    }

    public static function set($key,$val = '',$time = '')
    {
        $redis = \Yii::$app->redis;
        $redis->set($key, $val);
        $redis->expire($key, $time);
    }
}