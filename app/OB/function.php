<?php
/**
 * 公用函数库
 * Created by PhpStorm.
 * User: 蒋伟林
 * Date: 2018-12-10
 * Time: 10:55
 */

/**
 * 加载模板内容
 * @param $fileName
 * @param array $data
 */
function includeView($fileName, $data = [])
{
    $fileName = VIEW_PATH . "/" . $fileName;

    if (is_file($fileName)) {
        extract($data);
        require $fileName;
    }
}

/**
 * 内部跳转
 * @param $url
 */
function jumpInside($url)
{
    header('Location:/' . $url);
    exit;
}

/**
 * 错误提示页面
 * @param $data
 * @param int $type
 */
function errorView($data, $type = 1)
{
    $tipHtml = '';
    empty($data['tip']) && $data['tip'] = "抱歉";
    empty($data['content']) && $data['content'] = "";

    switch ($type) {
        case 1:
            $tipHtml = 'other/tip.php';
            break;
    }

    includeView($tipHtml, $data);
    exit;
}

/**
 * 默认异常处理
 * @param $exception
 */
function throwHandel($exception)
{
    $data['content'] = $exception->getMessage();
    errorView($data);
}

/**
 * 判断手机端
 * @return false|int
 */
function is_mobile(){

    // returns true if one of the specified mobile browsers is detected
    // 如果监测到是指定的浏览器之一则返回true

    $regex_match="/(nokia|iphone|android|motorola|^mot\-|softbank|foma|docomo|kddi|up\.browser|up\.link|";

    $regex_match.="htc|dopod|blazer|netfront|helio|hosin|huawei|novarra|CoolPad|webos|techfaith|palmsource|";

    $regex_match.="blackberry|alcatel|amoi|ktouch|nexian|samsung|^sam\-|s[cg]h|^lge|ericsson|philips|sagem|wellcom|bunjalloo|maui|";

    $regex_match.="symbian|smartphone|midp|wap|phone|windows ce|iemobile|^spice|^bird|^zte\-|longcos|pantech|gionee|^sie\-|portalmmm|";

    $regex_match.="jig\s browser|hiptop|^ucweb|^benq|haier|^lct|opera\s*mobi|opera\*mini|320x320|240x320|176x220";

    $regex_match.=")/i";

    // preg_match()方法功能为匹配字符，既第二个参数所含字符是否包含第一个参数所含字符，包含则返回1既true
    return preg_match($regex_match, strtolower($_SERVER['HTTP_USER_AGENT']));
}