<?php

namespace LTTools\Extension\Controllers\Update;

use Encore\Admin\Auth\Database\Administrator;
use LTTools\Extension\Controllers\Base\AdminBaseController;
use LTTools\Extension\Entities\InstallLog;
use LTTools\Extension\Facades\GridBuilder;
use LTTools\Extension\Tools\Grid\Grid;


/**
 * 更新控制器
 * Class UpdateController
 * @author wanghouting
 */
class UpdateController extends AdminBaseController
{

    public function __construct()
    {
        $this->header = '模块更新';
    }


    protected function grid() {
       return GridBuilder::buildGrid(Administrator::class,function (Grid $grid){
            $grid->iId();
       })->get();
    }


}