<?php

namespace LTTools\Extension\Facades;


use Illuminate\Support\Facades\Facade;
use LTTools\Extension\Tools\Grid\Grid;
use LTTools\Extension\Tools\Layout\Form;

/**
 * Class Admin.
 * @author wanghouting
 * @method static Grid grid($model, \Closure $callable)
 * @method static Form form($model, \Closure $callable)
 * @method static menu();
 */

class Admin extends Facade {

    protected static function getFacadeAccessor() {
        return \LTTools\Extension\Tools\Admin::class;
    }
}
