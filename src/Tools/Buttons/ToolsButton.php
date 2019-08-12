<?php

namespace LTTools\Extension\Tools\Buttons;




use LTTools\Extension\Tools\Admin;

class ToolsButton  {



    protected function script(){
        return <<<SCRIPT
SCRIPT;

    }

    /**
     * Render CreateButton.
     *
     * @return string
     */
    public function render()
    {
        header('X-Accel-Buffering: no');
        Admin::script($this->script());
        $route_prefix =  config('lttools.route_prefix');
        return <<<EOT
        <link type="text/css" href="/vendor/lttools/asidenav/asidenav.css" rel="stylesheet" >
<div >
    <svg width="0" height="0">
        <defs>
            <filter id="goo">
                <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur"></feGaussianBlur>
                <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"></feColorMatrix>
                <feComposite in="SourceGraphic" in2="goo" operator="atop"></feComposite>
            </filter>
        </defs>
    </svg>
    <div class="aside-nav bounceInUp animated" id="aside-nav" style="z-index: 9999">
        <label for="" class="aside-menu" title="按住拖动">工具</label>
        <a href="/{$route_prefix}/lttools/update" title="代码更新" class="menu-item menu-line menu-first">源码<br>更新</a>
        <a href="/{$route_prefix}/lttools/logs" target="_blank" title="日志" class="menu-item menu-second">日志</a>
        <a href="/{$route_prefix}/console" target="_blank" title="控制台" class="menu-item menu-line menu-third">shell<br/>控制台</a>
         <a href="javascript:void(0)" title="资源备份" class="menu-item menu-line menu-fourth">资源<br/>备份</a>

        <!--<a href="javascript:void(0)" title="开发中" class="menu-item menu-line menu-fourth">关注<br>微信</a>-->
    </div>
</div>    
        <script type="text/javascript" src="/vendor/lttools/asidenav/jquery.min.js"></script>
        <script type="text/javascript" src="/vendor/lttools/asidenav/asidenav.js"></script>
        
EOT;
    }
}
