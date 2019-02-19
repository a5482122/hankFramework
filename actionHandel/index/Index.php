<?php

namespace actionHandel\index;

use middleware\Middleware;

/**
 * Created by PhpStorm.
 * User: 蒋伟林
 * Date: 2018-12-10
 * Time: 16:39
 */
class Index extends Middleware
{
    public function index()
    {
        echo "已执行页面";
    }
}