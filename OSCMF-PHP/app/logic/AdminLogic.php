<?php
// +----------------------------------------------------------------------
// | OSCMF框架 [ 基于VUE和THINKPHP6的企业级管理框架 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2017 http://www.oscmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: King < 091004081@163.com > 2019/11/24 8:50 下午
// +----------------------------------------------------------------------


namespace app\logic;

use oscmf\system\SystemLogic;
use app\model\Admin;

/**
 * 管理员逻辑层
 * Class AdminLogic
 * @package app\logic
 * @Author: King < 091004081@163.com >
 */
class AdminLogic extends SystemLogic
{
    /**
     * 登陆逻辑
     * @param $params
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     * @Author: King < 091004081@163.com >
     */
    public static function login(array $params)
    {
        $admins=Admin::byUsernameToFind($params['username']);
        if($admins['id']){
            if($params['password']==$admins['password']){
                $data['token']=self::createToken($admins['id']);

                return app('json')->success('登陆成功！',$data);
            }else{
                return app('json')->fail('密码错误');
            }
        }else{
            return app('json')->fail('用户名不存在！');
        }
    }


    public static function getUserInfo(string $token)
    {
        //检验token并获取用户UID
        $uid=self::checkToken($token);
        $userInfo=Admin::getUser($uid);
        halt($userInfo);
    }

}