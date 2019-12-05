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
    protected $adminLogic;
    public function __construct(App $app,AdminLogic $adminLogic)
    {
        parent::__construct($app);
        $this->adminLogic=$adminLogic;
    }

    /**
     * 登陆
     * @return \think\response\Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     * @Author: King < 091004081@163.com >
     */
    public function login()
    {
//        Enforcer::addRoleForUser(2, 'super-admin');
        $params=$this->request->param();
        $result=$this->adminLogic->login($params);
        return $result;
    }

    /**
     * 验证token并返回用户信息及权限
     * @return \think\response\Json
     * @Author: King < 091004081@163.com >
     */
    public function getUserInfo()
    {
        //接收token
        $token=$this->request->header('access-token');
        $result=$this->adminLogic->getUserInfo($token);
        return app('json')->checkResult($result);
    }
}