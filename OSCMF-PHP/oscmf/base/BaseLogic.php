<?php
// +----------------------------------------------------------------------
// | OSCMF框架 [ 基于VUE和THINKPHP6的企业级管理系统 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2017 http://www.oscmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: King < 091004081@163.com > 2019/11/19 10:33 下午
// +----------------------------------------------------------------------


namespace oscmf\base;

use Firebase\JWT\JWT;
use think\facade\Config;
use think\facade\Db;

/**
 * 逻辑层基类
 * Class BaseLogic
 * @package oscmf\base
 * @Author: King < 091004081@163.com >
 */
class BaseLogic
{
    /**
     * 生成token
     * @param int $uid
     * @return string
     * @Author: King < 091004081@163.com >
     */
    public static function createToken(int $uid):string
    {
        //获取JWT钥匙
        $key=md5(Config::get('jwt.jwtKey'));
        $param = [
            "iss"=>"",  //签发者
            "aud"=>"", //面象的用户
            "iat" => time(), //签发时间
            "exp" => time()+Config::get('jwt.timeOut'), //token 过期时间
            "uid" => $uid //记录的userid的信息
        ];
        return JWT::encode($param,$key,Config::get('jwt.encryType'));
    }

    /**
     * 开启事物
     * @Author: King < 091004081@163.com >
     */
    public static function beginTrans()
    {
        Db::startTrans();
    }

    /**
     * 检测是否可以提交事物
     * @param $result
     * @Author: King < 091004081@163.com >
     */
    public static function checkTrans($result)
    {
        if($result){
            Db::commit();
        }else{
            Db::rollback();
        }
    }
}