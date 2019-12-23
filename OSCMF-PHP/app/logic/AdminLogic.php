<?php
// +----------------------------------------------------------------------
// | OSCMF框架 [ 基于VUE和THINKPHP6的企业级管理框架 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2017 http://www.oscmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: King < 091004081@163.com > 2019/11/24 8:50 下午
// +----------------------------------------------------------------------


namespace app\logic;

use app\model\AuthRule;
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
     * @param array $params
     * @return mixed
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
        $rulesArr=explode(",",$userInfo['authGroup']['rules']);
        //获取权限
        $rules=[];

        foreach ($rulesArr as $k => $v){
            $rule=AuthRule::getAuthRule($v);
            if($rule['pid']==0){
                array_push($rules,$rule);
            }
        }
        $_rules=[];
        foreach ($rules as $k => $v){

            $_rules[$v['module_id']]['name']=$v['authModule']['identifies'];
            $_rules[$v['module_id']]['component']=$v['authModule']['component'];
            $_rules[$v['module_id']]['redirect']="/".$v['authModule']['identifies']."/".$v['action'];
            $_rules[$v['module_id']]['title']=$v['authModule']['name'];
            $_rules[$v['module_id']]['key']=$v['authModule']['identifies'];
            $_rules[$v['module_id']]['meta']=[
                'icon'=>$v['authModule']['icon'],
                'title'=>$v['authModule']['name'],
                'show'=>true
            ];
            $_rules[$v['module_id']]['children'][]=[
                'name'=>$v['action'],
                'meta'=>[
                    'title'=>$v['title'],
                    'show'=>true,
                ],
                'component'=>$v['action'],
                'key'=>$v['action'],
            ];
        }
        $arr=[];
        foreach ($_rules as $k => $v){
            array_push($arr,$v);
        }
        $userInfo['rules']=$arr;
        return $userInfo;
    }

}