<?php
declare (strict_types = 1);

namespace app\service;

use oscmf\tool\Json;

class JsonService  extends \think\Service
{

    public $bind = [
        'json'    =>    Json::class,
    ];
    /**
     * 注册服务
     *
     * @return mixed
     */
    public function register()
    {
    	//
    }

    
    /**
     * 执行服务
     *
     * @return mixed
     */
    public function boot()
    {
        //
    }
}
