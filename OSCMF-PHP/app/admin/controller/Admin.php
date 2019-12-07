<?php
// +----------------------------------------------------------------------
// | OSCMF框架 [ 基于VUE和THINKPHP6的企业级管理框架 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2017 http://www.oscmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: King < 091004081@163.com > 2019/11/24 8:49 下午
// +----------------------------------------------------------------------


namespace app\admin\controller;

use app\admin\AdminBase;
use app\logic\AdminLogic;
use tauthz\facade\Enforcer;
use think\App;

/**
 * 管理员
 * Class AdminLogic
 * @package app\admin\controller
 * @Author: King < 091004081@163.com >
 */
class Admin extends AdminBase
{

    /**
     * 登陆
     * @return array
     * @Author: King < 091004081@163.com >
     */
    public function login()
    {
//        Enforcer::addPermissionForUser(1, 'cate','add','添加');
//        Enforcer::addPermissionForUser(1, 'cate','edit','编');
//        Enforcer::addPermissionForUser(1, 'cate','index','列表');
//        Enforcer::addPermissionForUser(1, 'cate','del','删除');
        $params=$this->request->param();
        $result=AdminLogic::login($params);
        return $result;
    }

    /**
     * 验证token并返回用户信息及权限
     * @return mixed
     * @Author: King < 091004081@163.com >
     */
    public function getUserInfo()
    {
        //接收token
        $token=$this->request->header('access-token');
        $result=AdminLogic::getUserInfo($token);
        return app('json')->checkResult($result);
    }
}