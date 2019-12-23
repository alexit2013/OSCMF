<?php
// +----------------------------------------------------------------------
// | OSCMF框架 [ 基于VUE和THINKPHP6的企业级管理框架 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2017 http://www.oscmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: King < 091004081@163.com > 2019/12/20 22:04
// +----------------------------------------------------------------------


namespace app\model;


use think\Model;

/**
 * 权限表
 * Class AuthRule
 * @package app\model
 * @Author: King < 091004081@163.com >
 */
class AuthRule extends Model
{
    public function authModule()
    {
        return $this->hasOne(AuthModule::class,'id','module_id');
    }
    public static function getAuthRule($id)
    {
        $result=AuthRule::with([
            'authModule'
        ])->find($id);
        return objectToArr($result);
    }
}