<?php

namespace app\OB\blog;

/**
 * Created by PhpStorm.
 * User: 蒋伟林
 * Date: 2018-12-12
 * Time: 17:18
 */

class Blog
{
    public function __construct()
    {
    }

    /**
     * 获取列表
     */
    public function lists()
    {
        $data = [['id' => 1, 'content' => 'blog is ok']];
        return $data;
    }
}