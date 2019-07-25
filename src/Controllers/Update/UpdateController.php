<?php

namespace LTTools\Extension\Controllers\Update;

use LTTools\Extension\Controllers\Base\AdminBaseController;
use LTTools\Extension\Exceptions\LTToolsWebConsoleException;
use LTTools\Extension\Facades\DynamicOutput;
use LTTools\Extension\Facades\ModulesFacade;
use LTTools\Extension\Facades\WebConsole;
use LTTools\Extension\Support\DynamicOutputSupport;
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

        $this->header = '本地代码更新';
    }

    public function index(Content $content)
    {
        $modules = ModulesFacade::getSubModulesData();

        $ModuleGrid = new ModuleGrid($modules);
        return $content->init($this->header,trans('admin.list'),$ModuleGrid->render());
    }

    /**
     * 更新源码
     */
    public function upgradeCode()
    {
        $modules = ModulesFacade::getSubModulesData();
        $clauses = [];

        foreach ($modules as $module ){
            DynamicOutput::addClause('开始更新 ' . $module['name'],DynamicOutputSupport::TYPE_MESSAGE);
            DynamicOutput::addClause('cd ' . $module['path'],DynamicOutputSupport::TYPE_COMMAND);
            DynamicOutput::addClause('git pull',DynamicOutputSupport::TYPE_COMMAND);
        }
        DynamicOutput::addClause('全部更新完成！',DynamicOutputSupport::TYPE_MESSAGE);
        DynamicOutput::output();

    }

    /**
     * 更新数据库
     */
    public function upgradeDb()
    {
        DynamicOutput::addClause('开始更新数据库 ' ,DynamicOutputSupport::TYPE_MESSAGE);
        DynamicOutput::addClause('php ../artisan migrate --seed ' ,DynamicOutputSupport::TYPE_COMMAND);
        DynamicOutput::addClause('php ../artisan module:migrate --seed' ,DynamicOutputSupport::TYPE_COMMAND);
        DynamicOutput::addClause('全部更新完成！',DynamicOutputSupport::TYPE_MESSAGE);
        DynamicOutput::output();
    }

    /**
     * 重置数据库
     */
    public function refreshDb(){
        DynamicOutput::addClause('开始重置数据库 ' ,DynamicOutputSupport::TYPE_MESSAGE);
        DynamicOutput::addClause('php ../artisan migrate:refresh  --seed' ,DynamicOutputSupport::TYPE_COMMAND);
        DynamicOutput::addClause('php ../artisan module:migrate-refresh --seed' ,DynamicOutputSupport::TYPE_COMMAND);
        DynamicOutput::addClause('全部重置完成！',DynamicOutputSupport::TYPE_MESSAGE);
        DynamicOutput::output();
    }
    

}