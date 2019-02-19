<?php

namespace actionHandel\other;

use middleware\Middleware;
use Gregwar\Captcha\CaptchaBuilder;

/**
 * Created by PhpStorm.
 * User: 蒋伟林
 * Date: 2018-12-10
 * Time: 16:39
 */
class Other extends Middleware
{
    //404页面
    public function notFind()
    {
        errorView(['tip' => 404, 'content' => '抱歉页面未找到！']);
    }

    /**
     * 验证码
     */
    public function captcha()
    {
        if ($this->request->isPost()) {
            $captcha = $username = $this->request->post('captcha');

            if ($_SESSION['phrase'] == $captcha) {
                $this->jsonOutput(true);
            } else {
                $this->jsonOutput(false, false);
            }
        }

        $builder = new CaptchaBuilder(4);
        $builder->build(100, 35);
        $_SESSION['phrase'] = $builder->getPhrase();
        header('Content-type: image/jpeg');
        $builder->output();
    }
}