<?php
// +----------------------------------------------------------------------
// | OSCMF框架 [ 基于VUE和THINKPHP6的企业级管理系统 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2017 http://www.oscmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: King < 091004081@163.com > 2019/11/19 10:41 下午
// +----------------------------------------------------------------------

// 应用公共文件

if(!function_exists('failed')){
    function failed(string $msg,int $code=404):array
    {
        return compact('msg','code');
    }
}

if(!function_exists('successful')){
    function successful(string $msg,int $code=200):array
    {
        return compact('msg','code');
    }
}