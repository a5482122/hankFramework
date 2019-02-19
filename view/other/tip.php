<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />

    <link href="<?php echo CSS_PATH?>/iconfont.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo CSS_PATH?>/H-ui.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo CSS_PATH?>/H-ui.admin.css" rel="stylesheet" type="text/css" />

    <title>提示页面</title>
</head>
<body>
<section class="container-fluid page-404 minWP text-c">
    <p class="error-title"><i class="Hui-iconfont va-m" style="font-size:80px">&#xe688;</i>
        <span class="va-m"> <?php echo $tip?></span>
    </p>
    <p class="error-description"><?php echo $content?></p>
    <p class="error-info">您可以：
        <a href="javascript:;" onclick="history.go(-1)" class="c-primary">&lt; 返回上一页</a>
        <span class="ml-20">|</span>
        <a href="/" class="c-primary ml-20">去首页 &gt;</a>
    </p>
</section>
<style>
    .page-404 {
        color: #afb5bf;
        padding-top: 60px;
        padding-bottom: 90px;
    }

    .text-c {
        text-align: center;
    }
    .container-fluid {
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
    }
    .va-m {
        vertical-align: middle!important;
    }

    * {
        word-wrap: break-word;
    }
    .page-404 .error-title {
        font-size: 80px;
    }
    .page-404 .error-description {
        font-size: 24px;
    }

    p {
        margin-bottom: 10px;
    }
    .c-primary, .c-primary a, a.c-primary {
        color: #5a98de;
    }
    .ml-20 {
        margin-left: 20px;
    }
    a {
        text-decoration: none;
        cursor: pointer;
    }
    .page-404 .error-info {
        font-size: 14px;
    }
</style>
</body>
</html>