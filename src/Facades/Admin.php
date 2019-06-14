<?php

namespace LTUpdate\Extension\Facades;


use Illuminate\Support\Facades\Facade;
use LTUpdate\Extension\Tools\Grid\Grid;
use LTUpdate\Extension\Tools\Layout\Form;

/**
 * Class Admin.
 * @author wanghouting
 * @method static Grid grid($model, \Closure $callable)
 * @method static Form form($model, \Closure $callable)
 * @method static menu();
 */

class Admin extends Facade {

    protected static function getFacadeAccessor() {
        return \LTUpdate\Extension\Tools\Admin::class;
    }
}
