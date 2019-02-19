<?php

namespace middleware;

use hank\base\database;
use hank\base\log;
use hank\base\redis;

/**
 * 控制层基类
 * Created by PhpStorm.
 * User: 蒋伟林
 * Date: 2018-12-11
 * Time: 14:24
 */
abstract class Action
{
    public $request = [];
    static $classArray = [];
    public static $logHandel;
    use log, redis, database;

    public function __construct()
    {

    }

    public function getOB($className)
    {
        if (empty(static::$classArray[$className])) {
            $class = "app\OB\\" . str_replace(".", "\\", $className);
            static::$classArray[$className] = new $class();
        }

        return static::$classArray[$className];
    }

    public function set($name, $vaule)
    {
        $this->setValue[$name] = $vaule;
    }

    /**
     * @param $fileName
     */
    public function display($fileName)
    {
        $htmlFile = VIEW_PATH . "/" . str_replace(".", "/", $fileName) . ".php";

        if (is_file($htmlFile)) {
            extract($this->setValue);
            require_once $htmlFile;
        }

        exit;
    }

    /**
     * json统一格式化
     * @param array|string $data
     * @param bool $status
     * @return string
     */
    public function jsonFormat($data = null, $status = true)
    {
        $result = [
            'code' => $status === true ? 200 : 400,
            'data' => $data
        ];
        return json_encode($result);
    }

    /**
     * json输出
     * @param array|string $data
     * @param bool $status
     */
    public function jsonOutput($data = null, $status = true)
    {
        $result = $this->jsonFormat($data, $status);
        echo $result;
        exit;
    }


    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }
}