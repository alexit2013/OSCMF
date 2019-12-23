<?php
// +----------------------------------------------------------------------
// | OSCMF框架 [ 基于VUE和THINKPHP6的企业级管理系统 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2017 http://www.oscmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: King < 091004081@163.com > 2019/11/19 10:41 下午
// +----------------------------------------------------------------------

// 应用公共文件

if (!function_exists('objectToArr')) {
    /**
     * 对象转数组，如果对象为空，返回空数组
     * @param $result
     * @return array
     * @Author: King < 091004081@163.com >
     */
    function objectToArr($result): array
    {
        if (!empty($result) && is_object($result)) {
            $data = $result->toArray();
        } else {
            $data = [];
        }
        return $data;
    }
}