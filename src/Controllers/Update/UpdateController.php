<?php

namespace LTTools\Extension\Controllers\Update;

use LTTools\Extension\Controllers\Base\AdminBaseController;
use LTTools\Extension\Exceptions\LTToolsWebConsoleException;
use LTTools\Extension\Facades\ModulesFacade;
use LTTools\Extension\Facades\WebConsole;
use LTTools\Extension\Tools\Buttons\ToolsButton;
use LTTools\Extension\Tools\Custom\ModuleGrid;
use LTTools\Extension\Tools\Layout\Content;


/**
 * 更新控制器
 * Class UpdateController
 * @author wanghouting
 */
class UpdateController extends AdminBaseController
{

    protected $description = "操作";


    public function __construct()
    {

        echo (new ToolsButton())->render();
        $this->header = '本地代码更新';
    }

    public function index(Content $content)
    {
        $modules = ModulesFacade::getSubModulesData();

        $ModuleGrid = new ModuleGrid($modules);
        return $content->init($this->header,trans('admin.list'),$ModuleGrid->render());
    }


    private function initBody(){
        echo "<style> body {background-color: #0C0C0C} </style>";
        echo "<div style='width:100%;height: auto;background-color: #0C0C0C;margin: 10px 0;'>";
        echo "<script>var scroll = function(){ $('body').scrollTop(1000000);}; </script>";
        set_time_limit(0);
        ob_implicit_flush();
    }

    private  function endBody(){
        echo "</div>";
    }

    private function getScroll(){
        return  "<script> scroll() </script>";
    }


    public function upgradeCode()
    {
        $modules = ModulesFacade::getSubModulesData();
        $this->initBody();

        try{
            foreach ($modules as $module ){
                $this->ssPrint('开始更新 ' . $module['name']);
                $command = 'cd ' . $module['path'];
                $this->ssPrint($command);
                $res =  WebConsole::execute_command($command);
                $this->ssPrint($res['output']);
                @chdir($module['path']);
                $command = 'git pull ';
                $this->ssPrint($command);
                $res = WebConsole::execute_command($command);
                $this->ssPrint($res['output']);
            }
            $this->ssPrint('全部更新完成！');
        }catch (LTToolsWebConsoleException $e){
            $this->ssPrint("error:".$e->getMessage(),true);
            $this->ssPrint("stopped",true);
        }
        $this->endBody();
    }

    public function upgradeDb()
    {
        $this->initBody();
        try{

            $this->ssPrint('开始更新数据库');
            $command = 'php ../artisan migrate --seed';
            $this->ssPrint($command);
            $res = WebConsole::execute_command($command);
            $this->ssPrint($res['output']);
            $command = 'php ../artisan module:migrate --seed';
            $this->ssPrint($command);
            $res = WebConsole::execute_command($command);
            $this->ssPrint($res['output']);
            $this->ssPrint('全部更新完成！');
        }catch (LTToolsWebConsoleException $e){
            $this->ssPrint("error:".$e->getMessage(),true);
            $this->ssPrint("stopped",true);
        }

        $this->endBody();
    }

    public function refreshDb(){
        $this->initBody();
        try{

            $this->ssPrint('开始重置数据库');
            $command = 'php ../artisan migrate:refresh  --seed';
            $this->ssPrint($command);
            $res = WebConsole::execute_command($command);
            $this->ssPrint($res['output']);
            $command = 'php ../artisan module:migrate-refresh --seed';
            $this->ssPrint($command);
            $res = WebConsole::execute_command($command);
            $this->ssPrint($res['output']);
            $this->ssPrint('全部重置完成！');
        }catch (LTToolsWebConsoleException $e){
            $this->ssPrint("error:".$e->getMessage(),true);
            $this->ssPrint("stopped",true);
        }
        $this->endBody();
    }
    
    protected function ssPrint($message,$isError = false){
        if(empty(trim($message))) return;
        $messageArr = explode('---',$message);
        foreach ($messageArr as $m){
            if(empty($m)) continue;
            $color = $isError ? 'red' : 'floralwhite';
            echo  "<span style='color: ".$color.";line-height: 20px;font-size: 13px;'>&nbsp;&nbsp;&nbsp;&nbsp;".date("Y-m-d H:i:s").': '. $m."</span></br>".$this->getScroll();
        }
        usleep(500000);
    }
}