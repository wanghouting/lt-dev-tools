<?php

namespace LTTools\Extension\Support;

use LTTools\Extension\Facades\Admin;
use LTTools\Extension\Tools\Grid\Grid;

use Closure;
/**
 * Class GridViewBuilder
 * @author wanghouting
 * @package LTTools\Extension\Support
 */
class GridViewBuilder {
    /**
     * @var Grid;
     */
    protected $grid = null;

    /**
     * 创建表格
     * @param $model
     * @param Closure $callback
     * @return $this
     * @deprecated please use LTTools\Extension\Facades\GridBuilder::buildGrid
     */
    public function buildGrid($model,Closure $callback ) {

        $this->grid = Admin::grid($model,$callback);
        return $this;
    }

    /**
     * 返回创建好的表格
     * @return Grid
     */
    public function get() {
        return $this->grid;
    }
}
