<?php

namespace hank;

use app\Route;

/**
 * Created by PhpStorm.
 * User: 蒋伟林
 * Date: 2018-12-10
 * Time: 10:29
 */
class start
{
    private static $loadFileClass = [];

    /**
     * 框架初始化
     */
    public static function app()
    {
        /**
         * 1、加载常量文件
         * 2、加载公用函数库
         * 3、初始化框架配置
         */
        if (DEBUG === true) {
            error_reporting(E_ALL);
        } else {
            error_reporting(0);
        }

        require "consDefine.php";
        require APP_PATH . "/OB/function.php";
        self::sessionStart();//执行session
        return new self;
    }

    /**
     * 运行框架
     */
    public function run()
    {
        $route = new route();
        $urlPath = $route->getRoutePath();
        $handel = new $urlPath['namespace']();//执行对应控制器

        if (method_exists($handel, $urlPath['func'])) {
            $func = $urlPath['func'];
            $handel->$func();
        } else {
            echo "未找到该方法";
        }
    }

    //自动加载   使用composer的自动加载，本方法弃用

    /**
     * @param $class
     * @return bool
     */
    public static function load($class)
    {
        if (!empty(self::$loadFileClass[$class])) {
            return true;
        } else {
            $class = str_replace(["\\", 'hank'], ["/", 'hankFramework'], $class);//框架的命名空间特殊处理
            $file = ROOT_PATH . "/" . $class . ".php";

            if (is_file($file)) {
                self::$loadFileClass[$class] = $file;
                require $file;
                return true;
            } else {
                echo "未找到控制器" . $class;
                return false;
            }
        }
    }

    /**
     * 开启session及配置
     */
    public static function sessionStart()
    {
        session_start();
    }
}