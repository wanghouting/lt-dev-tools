<?php

namespace LTUpdate\Extension\Facades;


use Closure;
use Illuminate\Support\Facades\Facade;
use LTUpdate\Extension\Support\GridViewBuilder;

/**
 * Class GridBuilder
 * @method static GridViewBuilder buildGrid($model,Closure $callback )
 */
class GridBuilder extends Facade {
    protected static function  getFacadeAccessor() {
        return GridViewBuilder::class;
    }
}
