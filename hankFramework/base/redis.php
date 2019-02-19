<?php

namespace hank\base;

use Predis\Client;
use hank\lib\Config;

/**
 * Created by PhpStorm.
 * User: 蒋伟林
 * Date: 2018-12-17
 * Time: 11:37
 */
trait redis
{
    private static $redisClass;

    public function redisHandel()
    {
        if (empty(self::$redisClass)) {
            self::$redisClass = new Client(Config::get(Config::get('use', 'redis'), 'redis'));//加载redis配置
        }

        return self::$redisClass;
    }
}