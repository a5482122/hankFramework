<?php

namespace actionHandel\blog;

use hank\lib\Request;
use middleware\UserMiddleware;
use hank\lib\Config;

/**
 * Created by PhpStorm.
 * User: 蒋伟林
 * Date: 2018-12-10
 * Time: 17:15
 */
class index extends UserMiddleware
{
    public static $logName = 'blog';
    public $LogOB, $RedisOB, $DB;

    public function __construct()
    {
        $this->LogOB = $this->logHandel();
        Config::get('status', 'redis') && $this->RedisOB = $this->redisHandel();
        $this->DB = $this->DB();
    }

    public function lists()
    {
//        echo Request::instance()->get("sex", 2);
        $blogOB = $this->getOB('blog.Blog');
        $data = $blogOB->lists();
        $data = $this->LogOB->getName();
        $data = $this->DB->select('blog', "*");
        print_r($data);
        echo "<hr/>";
        $this->jsonOutput($data);
    }

    public function show()
    {
        echo "日志详情";
    }
}