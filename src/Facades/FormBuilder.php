<?php

namespace LTUpdate\Extension\Facades;



use Illuminate\Support\Facades\Facade;
use LTUpdate\Extension\Support\FormViewBuilder;

/**
 * Class FormBuilder.
 *
 * @method static  LTUpdate\Extension\Support\FormViewBuilder buildFrom($model, \Closure $callback)
 * @method static  LTUpdate\Extension\Support\FormViewBuilder footer(bool $showViewCheck = false, bool $showEditCheck = false, bool $showCreateCheck = false)
 * @method static  LTUpdate\Extension\Support\FormViewBuilder tools(bool $showList = false, bool $showDelete = false ,bool $showView = false)
 * @method static \Encore\Admin\Form get()
 * @method static  LTUpdate\Extension\Support\FormViewBuilder setTitle($title)
 * @method static  LTUpdate\Extension\Support\FormViewBuilder setAction($action)
 */

class FormBuilder extends Facade {
    protected static function getFacadeAccessor(){
        return FormViewBuilder::class;
    }
}
