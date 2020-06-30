<?php

namespace app\http\middleware;
use think\facade\Session;
class Auth
{
    public function handle($request, \Closure $next)
    {
    	$admin_id = Session::get('admin_id', 'admin');
    	//dump($admin_id);
    	if(empty($admin_id))
    	{
    		return redirect('auth/create');
    	}
    	return $next($request);
    }
}
