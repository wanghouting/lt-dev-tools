<?php
namespace LTTools\Extension\Middleware;

use Illuminate\Http\Request;
use LTTools\Extension\Facades\LTTools;

class Base
{
    //排除的控制器
    private $except = [

    ];

    public function handle(Request $request, \Closure $next)
    {
        $uri = $request->route()->getAction()['controller'];
        if(!$request->isXmlHttpRequest() && !in_array($uri,$this->except)){
            $arr = explode('@',$uri);
            if($arr[count($arr) -1 ] === 'index'){
                LTTools::showNav();
            }
        }
        return $next($request);
    }
}
