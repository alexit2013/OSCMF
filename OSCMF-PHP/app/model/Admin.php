<?php
// +----------------------------------------------------------------------
// | OSCMF框架 [ 基于VUE和THINKPHP6的企业级管理框架 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2017 http://www.oscmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: King < 091004081@163.com > 2019/11/24 8:51 下午
// +----------------------------------------------------------------------


namespace app\model;

use oscmf\system\SystemModel;

/**
 * 管理员模型层
 * Class AdminLogic
 * @package app\model
 * @Author: King < 091004081@163.com >
 */
class Admin extends SystemModel
{
    //关联角色组表
    public function authGroup()
    {
        return $this->belongsTo(AuthGroup::class, 'rule_id', 'id');
    }

    /**
     * 通过用户名查询信息
     * @param $username
     * @return array|\think\Model|null
     * @Author: King < 091004081@163.com >
     */
    public static function byUsernameToFind($username)
    {
        $result=self::where(['user_name' => $username])->find();
        return objectToArr($result);
    }

    /**
     * @param $uid
     * @return array
     * @Author: King < 091004081@163.com >
     */
    public static function getUser($uid)
    {
        $result = self::with([
            'authGroup'
        ])->find($uid);
        return objectToArr($result);
    }

    public static function getUserAll()
    {

    }

    public static function delUser()
    {

    }

    public static function setUser()
    {

    }
}