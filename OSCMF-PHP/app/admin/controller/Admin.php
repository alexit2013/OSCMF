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

    public function login()
    {
        $params=$this->request->param();
        $res=$this->adminLogic->login($params);
        return json($res);
    }

    public function getUserInfo()
    {
        $token=$this->request->header('access-token');
        $result=$this->adminLogic->getUserInfo($token);
        return json($result);
    }
}