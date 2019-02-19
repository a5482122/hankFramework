<?php

namespace hank\base;

use Medoo\Medoo;
use hank\lib\Config;

/**
 * Created by PhpStorm.
 * User: 蒋伟林
 * Date: 2018-12-17
 * Time: 11:37
 */
trait database
{
    private static $DBClass;

    public function DB()
    {
        if (empty(self::$DBClass)) {
            self::$DBClass = new Medoo(Config::get(Config::get('use', 'database'), 'database'));//加载redis配置
        }

        return self::$DBClass;
    }
}