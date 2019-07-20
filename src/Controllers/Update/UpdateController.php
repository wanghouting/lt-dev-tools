<?php

namespace LTTools\Extension\Controllers\Update;

use Encore\Admin\Auth\Database\Administrator;
use Encore\Admin\Facades\Admin;
use LTTools\Extension\Controllers\Base\AdminBaseController;
use LTTools\Extension\Facades\GridBuilder;
use LTTools\Extension\Facades\ModulesFacade;
use LTTools\Extension\Tools\Buttons\ToolsButton;
use LTTools\Extension\Tools\Custom\ModuleGrid;
use LTTools\Extension\Tools\Grid\Grid;
use LTTools\Extension\Tools\Layout\Content;
use Nwidart\Modules\Module;


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
        $this->header = '本地模块更新';
    }

    public function index(Content $content)
    {
        $modules = ModulesFacade::getSubModulesData();

        $ModuleGrid = new ModuleGrid($modules);
        return $content->init($this->header,trans('admin.list'),$ModuleGrid->render());
    }

    public function upgradeCode()
    {
        $modules = ModulesFacade::getSubModulesData();


        echo "<div style='width:100%;height: 100%;background-color: #0C0C0C'>";

        set_time_limit(0);

        ob_implicit_flush();
        foreach ($modules as $module ){
            $this->ssPrint('开始更新 ' . $module['name']);
            $this->ssPrint( shell_exec(__DIR__.'/../../Shell/linux/update.sh  code '. $module['path']));
        }

        $this->ssPrint('全部更新完成！');

        echo "</div>";
    }

    public function upgradeDb()
    {
        $modules = ModulesFacade::getSubModulesData();


        echo "<div style='width:100%;height: 100%;background-color: #0C0C0C'>";

        set_time_limit(0);

        ob_implicit_flush();
        foreach ($modules as $module ){
            $this->ssPrint('开始更新 ' . $module['name']);
            $this->ssPrint( shell_exec(__DIR__.'/../../Shell/linux/update.sh  db '. $module['path']));
        }

        $this->ssPrint('全部更新完成！');

        echo "</div>";
    }

    protected function ssPrint($message){
        $messageArr = explode('---',$message);
        foreach ($messageArr as $m){
            if(empty($m)) continue;
            echo  "<span style='color: floralwhite;line-height: 20px;font-size: 13px;'>&nbsp;&nbsp;&nbsp;&nbsp;".date("Y-m-d H:i:s").': '. $m."</span></br>";
        }

        sleep(1);
    }
}