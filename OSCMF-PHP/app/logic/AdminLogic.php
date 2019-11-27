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
 * Class AdminLogic
 * @package app\logic
 * @Author: King < 091004081@163.com >
 */
class AdminLogic extends BaseLogic
{
    public static function login($params)
    {
        $admins=AdminModel::byUsernameToFind($params['username']);
        if($admins['id']){
            if($params['password']==$admins['password']){
                $token=self::createToken($admins['id']);
                return successful("登陆成功！");
            }else{
                return failed(['data'=>'失败']);
            }
        }else{
            return failed('用户不存在〜');
        }
    }

}