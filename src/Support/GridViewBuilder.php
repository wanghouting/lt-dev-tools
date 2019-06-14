<?php

namespace LTUpdate\Extension\Support;

use LTUpdate\Extension\Facades\Admin;
use LTUpdate\Extension\Tools\Grid\Grid;

use Closure;
/**
 * Class GridViewBuilder
 * @author wanghouting
 * @package LTUpdate\Extension\Support
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
     * @deprecated please use LTUpdate\Extension\Facades\GridBuilder::buildGrid
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
