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
use app\logic\Admin as AdminLogic;

/**
 * 管理员
 * Class Admin
 * @package app\admin\controller
 * @Author: King < 091004081@163.com >
 */
class Admin extends AdminBase
{
    public function login()
    {
        $params=$this->request->param();
        $res=AdminLogic::login($params);
        return json($res);
    }
}