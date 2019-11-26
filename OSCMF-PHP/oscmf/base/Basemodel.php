<?php
// +----------------------------------------------------------------------
// | OSCMF框架 [ 基于VUE和THINKPHP6的企业级管理系统 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2017 http://www.oscmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: King < 091004081@163.com > 2019/11/19 10:34 下午
// +----------------------------------------------------------------------


namespace oscmf\base;

use think\Model;
use think\facade\Db;
/**
 * model基类
 * Class Basemodel
 * @package oscmf\base
 * @Author: King < 091004081@163.com >
 */
class Basemodel extends Model
{
    /**
     * 获取字段值
     * @param string $table             表名
     * @param array $where              条件
     * @param bool|string $needField    需要获取的字段
     * @return string
     * @Author: King < 091004081@163.com >
     */
    public static function getValues(string $table,array $where=[],$needField):string
    {
        return Db::name($table)->where($where)->value($needField);
    }
}