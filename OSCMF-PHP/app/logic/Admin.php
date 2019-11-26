<?php
// +----------------------------------------------------------------------
// | OSCMF框架 [ 基于VUE和THINKPHP6的企业级管理框架 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2017 http://www.oscmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: King < 091004081@163.com > 2019/11/24 8:50 下午
// +----------------------------------------------------------------------


namespace app\logic;

use oscmf\base\BaseLogic;
use app\model\Admin as AdminModel;

/**
 * 管理员逻辑层
 * Class Admin
 * @package app\logic
 * @Author: King < 091004081@163.com >
 */
class Admin extends BaseLogic
{
    public static function login($params)
    {
        $admins=AdminModel::byUsernameToFind($params['username']);
        $data=[];
        if($admins['id']){
            if($params['password']==$admins['password']){
                $data[]=self::createToken($admins['id']);
            }else{
                $data[]=failed("密码错误〜");
            }
        }else{
            $data[]=failed('用户不存在〜');
        }
        return $data;
    }

}