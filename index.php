<?php
/**
 * Created by PhpStorm.
 * User: 蒋伟林
 * Date: 2018-12-04
 * Time: 15:00
 */
//header('Access-Control-Allow-Origin:http://localhost:8080');//允许所有来源访问
//header('Access-Control-Allow-Method:POST,GET');//允许访问的方式
define("DEBUG", true);
define('ROOT_PATH', __DIR__);//网站根目录
define('APP_PATH', __DIR__ . "/app");
require ROOT_PATH . "/vendor/autoload.php";
//require ROOT_PATH . "/hankFramework/start.php";
//spl_autoload_register("\hank\start::load");
\hank\start::app()->run();

