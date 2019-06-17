<?php

namespace LTTools\Extension\Tools;


use Closure;
use LTTools\Extension\Tools\Form\Form;
use LTTools\Extension\Tools\Grid\Grid;

/**
 * Class Admin
 * @author wanghouting
 * @package App\Admin
 */
class Admin extends  \Encore\Admin\Admin {
    public function __construct()
    {
       self::$baseCss = array_merge(self::$baseCss,[
           'vendor/lt-dev-tools/layer/theme/default/layer.css',
       ]);
       self::$baseJs = array_merge(self::$baseJs,[
           'vendor/lt-dev-tools/layer/layer.js',
       ]);
    }

    /**
     * @param $model
     * @param Closure $callable
     * @return Grid|\Encore\Admin\Grid
     * @deprecated please use Modules\Admin\Facades\Admin::grid
     */
    public function grid($model, Closure $callable)
    {
        return new Grid($this->getModel($model), $callable);
    }


    /**
     * @param $model
     * @param Closure $callable
     * @return Form|\Encore\Admin\Form
     * @deprecated please use App\Admin\Facades\Admin::form
     */
    public function form($model, Closure $callable)
    {
        return new Form($this->getModel($model), $callable);
    }

//    /**
//     * @param $model
//     * @param null $callable
//     * @return Show|\Encore\Admin\Show
//     * @deprecated please use App\Admin\Facades\Admin::show
//     */
//    public function show($model, $callable = null)
//    {
//        return new Show($this->getModel($model), $callable);
//    }
}
