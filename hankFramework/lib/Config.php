<?php
/**
 * Created by PhpStorm.
 * User: 蒋伟林
 * Date: 2018-12-12
 * Time: 10:35
 */

namespace hank\lib;


class Config
{
    private static $config = [];

    /**
     * @param string|bool $name 配置名称，数组以"."分割
     * @param string $file 文件路径，多层目录已"."分割
     * @return mixed|null|void|string
     */
    public static function get($name = "", $file = 'default')
    {
        if (empty(self::$config[$file])) {
            $filePath = str_replace(".", "/", $file);
            $filePath = CONFIG_PATH . "/" . $filePath . ".php";

            if (is_file($filePath)) {
                self::$config[$file] = require($filePath);
            } else {
                return null;
            }
        }

        if ($name === "") {
            return self::$config[$file];
        } else {
            $nameArray = explode(".", $name);
            $keyNum = count($nameArray);
            $result = self::$config[$file];

            for ($i = 0; $i < $keyNum; $i++) {
                if (!empty($result[$nameArray[$i]])) {
                    $result = $result[$nameArray[$i]];
                } else {
                    $result = null;
                    break;
                }
            }

            return $result;
        }
    }

}