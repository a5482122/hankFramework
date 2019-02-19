<?php

namespace app;
/**
 * Created by PhpStorm.
 * User: 蒋伟林
 * Date: 2018-12-10
 * Time: 11:11
 */
class Route
{
    const ACTION_NAMESPACE_PRE = '\actionHandel';
    private $routeUrl = [
        'notFind' => 'other/Other/notFind',
        'uploadImg' => 'index/Upload/img',
        'captcha' => 'other/Other/captcha',//验证码

        'index' => 'index/index/index',
        'blogList' => 'blog/index/lists'
    ];

    public function getRoutePath()
    {
        /**
         * 1、解析url
         * 2、寻找执行对应方法
         */
        if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/') {
            $path = preg_replace(["/([\.][a-zA-Z]*)*/", "/[\?]/", "/[\/][\/]/"], ["", "/", "/"], $_SERVER['REQUEST_URI']);//截取掉后缀
            $path = preg_replace("/([\/])/", "", $path, 1);//截取掉第一个：/
            $path = explode("/", $path);
            $pathArray = (empty($this->routeUrl[$path[0]]) ? $path : explode("/", $this->routeUrl[$path[0]]));
        } else {
            $pathArray = explode("/", $this->routeUrl['index']);
        }

        $urlPath = empty($pathArray) || count($pathArray) < 3 ? explode("/", $this->routeUrl['notFind']) : $pathArray; //找不到页面进入错误页
        $handel = [
            'namespace' => self::ACTION_NAMESPACE_PRE . "\\" . $urlPath[0] . "\\" . $urlPath[1],
            'model' => $urlPath[0],
            'action' => $urlPath[1],
            'func' => $urlPath[2],
        ];
        return $handel;
    }
}