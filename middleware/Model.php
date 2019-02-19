<?php

namespace middleware;

use hank\base\database;
use hank\base\log;

/**
 * 控制层基类
 * Created by PhpStorm.
 * User: 蒋伟林
 * Date: 2018-12-11
 * Time: 14:24
 */
abstract class Model
{
    const PAGE_SIZE = 20;
    public $request = [];
    static $classArray = [], $table;
    public static $logHandel;
    public $DB;
    use log, database;

    public function __call($method, $arg)
    {
        $rule['data'] = empty($arg[0]['data']) ? [] : $arg[0]['data'];
        $rule['where'] = empty($arg[0]['where']) ? [] : $arg[0]['where'];

        switch ($method) {
            case 'insert':
                $this->DB()->$method(static::$table, $rule['data']);
                return $this->DB()->id();
                break;
            case 'update':
                if (empty($rule['where'])) {
                    return false;
                }
                return $this->DB()->$method(static::$table, $rule['data'], $rule['where'])->rowCount();
                break;
            case 'delete':
                return $this->DB()->$method(static::$table, $rule['where'])->rowCount();
                break;
            case 'lists':
                $countNum = $this->DB()->count(static::$table, $rule['where']);
                $size = empty($arg[0]['size']) ? self::PAGE_SIZE : $arg[0]['size'];
                $page = !empty($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
                !empty($arg[0]['page']) && is_numeric($arg[0]['page']) && $page = $arg[0]['page'];
                $rule['where']['LIMIT'] = [($page - 1) * $size, $size];
                $rule['field'] = empty($arg[0]['field']) ? "*" : $arg[0]['field'];
                $result['data'] = $this->DB()->select(static::$table, $rule['field'], $rule['where']);
                $result['pages'] = [
                    'count' => $countNum,
                    'page' => $page,
                    'size' => $size,
                    'page_num' => ceil($countNum / $size)
                ];
                $paramUrl = "?size=" . self::PAGE_SIZE;

                foreach ($_GET as $key => $row) {
                    if ($key == 'page' || $key == 'size') continue;
                    $paramUrl .= "&" . $key . "=" . $row;
                }

                $result['pages']['param_url'] = $paramUrl;
                return $result;
                break;
            default:
                empty($rule['where']['LIMIT']) && $rule['where']['LIMIT'] = 20;
                $rule['field'] = empty($arg[0]['field']) ? "*" : $arg[0]['field'];
                return $this->DB()->$method(static::$table, $rule['field'], $rule['where']);
                break;
        }
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }
}