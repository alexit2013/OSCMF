<?php
// +----------------------------------------------------------------------
// | OSCMF框架 [ 基于VUE和THINKPHP6的企业级管理系统 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2017 http://www.oscmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: King < 091004081@163.com > 2019/11/19 10:33 下午
// +----------------------------------------------------------------------


namespace oscmf\system;

use Firebase\JWT\JWT;
use think\facade\Config;
use think\facade\Db;

/**
 * 系统基础配置文件
 * Class SystemLogic
 * @package oscmf\base
 * @Author: King < 091004081@163.com >
 */
class SystemLogic
{
    /**
     * 成功
     * @param string $msg 消息
     * @param array $result 内容数据
     * @param int $code 状态码
     * @return array            返回一个数组
     * @Author: King < 091004081@163.com >
     */
    public function successNotice(string $msg = '请求数据成功！', array $result = [], int $code = 200): array
    {
        return compact('msg', 'code', 'result');
    }

    /**
     * @param string $msg 消息
     * @param int $code 状态码
     * @return array            返回数组
     * @Author: King < 091004081@163.com >
     */
    public function failedNotice(string $msg = '请求数据失败！', int $code = 404): array
    {
        return compact('msg', 'code');
    }

    /**
     * 生成token
     * @param int $uid
     * @return string
     * @Author: King < 091004081@163.com >
     */
    public function createToken(int $uid): string
    {
        //获取JWT钥匙
        $key = md5(Config::get('jwt.jwtKey'));
        $param = [
            "iss" => "",  //签发者
            "aud" => "", //面象的用户
            "iat" => time(), //签发时间
            "exp" => time() + Config::get('jwt.timeOut'), //token 过期时间
            "uid" => $uid //记录的userid的信息
        ];
        return JWT::encode($param, $key, Config::get('jwt.encryType'));
    }

    /**
     * 验证token
     * @param string $token
     * @return array
     * @Author: King < 091004081@163.com >
     */
    public function checkToken(string $token)
    {
        if (!$token) {
            return $this->failedNotice("token参数缺失");
        }
        //获取JWT钥匙
        $key = md5(Config::get('jwt.jwtKey'));

        try {
            $info = JWT::decode($token, $key, [Config::get('jwt.encryType')]);
        } catch (\Firebase\JWT\SignatureInvalidException $e) {
            //签名不正确
            return $this->failedNotice($e->getMessage());
        } catch (\Firebase\JWT\BeforeValidException $e) {
            //签名在某个时间点之后生效
            return $this->failedNotice($e->getMessage());
        } catch (\Firebase\JWT\ExpiredException $e) {
            //token过期
            return $this->failedNotice($e->getMessage());
        } catch (Exception $e) {
            //其它异常
            return $this->failedNotice($e->getMessage());
        }
        return $info->uid;
    }

    /**
     * 开启事物
     * @Author: King < 091004081@163.com >
     */
    public function beginTrans()
    {
        Db::startTrans();
    }

    /**
     * 检测是否可以提交事物
     * @param $result
     * @Author: King < 091004081@163.com >
     */
    public function checkTrans($result)
    {
        if ($result) {
            Db::commit();
        } else {
            Db::rollback();
        }
    }
}