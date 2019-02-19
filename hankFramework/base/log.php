<?php

namespace hank\base;

use Monolog\Logger;

/**
 * Created by PhpStorm.
 * User: 蒋伟林
 * Date: 2018-12-17
 * Time: 11:27
 */
trait log
{
    public static $logName = 'default';
    private static $listClass = [];

    public function logHandel()
    {
        if (empty($listClass[static::$logName])) {
            $listClass[static::$logName] = new Logger(static::$logName);
        }

        return $listClass[static::$logName];
    }
}