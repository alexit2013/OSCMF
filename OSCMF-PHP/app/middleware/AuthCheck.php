<?php
declare (strict_types = 1);

namespace app\middleware;

class AuthCheck
{
    /**
     * 检测权限
     * @param \think\Request $request
     * @param \Closure       $next
     * @return Response
     */
    public function handle($request, \Closure $next)
    {
        $controller=$request->controller();
        $action=$request->action();

        halt($request);
        return $next[$request];
    }

    public function checkAuth()
    {

    }
}
