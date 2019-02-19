<?php
/**
 * Created by PhpStorm.
 * User: 蒋伟林
 * Date: 2018-12-10
 * Time: 10:51
 */

define('IS_CLI', PHP_SAPI == 'cli' ? true : false);
define('CONFIG_PATH', ROOT_PATH . "/config");

define('RESOURCE', "/resource");
define('CSS_PATH', RESOURCE . "/css");
define('JS_PATH', RESOURCE . "/js");
define('IMAGE_PATH', RESOURCE . "/images");
define('LOG_PATH', RESOURCE . "/log");
define('VIEW_PATH', ROOT_PATH . "/view");
define('UPLOAD_PATH', ROOT_PATH . "/resource/upload");
define('UPLOAD_URL', RESOURCE . "/upload");


define('STR_TIME', time());//当前时间
define('VISIT_IP', $_SERVER['REMOTE_ADDR']);//当前访问IP