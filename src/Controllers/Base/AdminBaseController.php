<?php

namespace LTUpdate\Extension\Controllers\Base;


use Encore\Admin\Controllers\HasResourceActions;
use Illuminate\Routing\Controller;
use LTUpdate\Extension\Facades\SettingFacade;
use Modules\Admin\Tools\Form\Form;
use Modules\Admin\Tools\Grid\Grid;
use Modules\Admin\Tools\Layout\Content;
use Modules\Admin\Tools\Show\Show;

use RuntimeException;




/**
 * Class AdminBaseController
 * @author wanghouting
 * @package LTUpdate\Extension\Controllers\Base;
 */
class AdminBaseController extends Controller
{

    use HasResourceActions;

    protected $header;
    protected $id = 0;

    /**
     * @param Content $content
     * @return mixed
     */
    public function index(Content $content) {
        return $content->init($this->header,trans('admin.list'),$this->grid()->render());
    }

    /**
     * @param $id
     * @param Content $content
     * @return mixed
     */
    public function show($id, Content $content){
        $this->id = $id;
        return $content->init($this->header,trans('admin.detail'),$this->detail($id));
    }

    /**
     * @param $id
     * @param Content $content
     * @return mixed
     */
    public function edit($id, Content $content){
        $this->id = $id;
        return $content->init($this->header,trans('admin.edit'),$this->form()->edit($id));

    }


    /**
     * @param Content $content
     * @return mixed
     */
    public function create(Content $content){
        return $content->init($this->header,trans('admin.create'),$this->form());
    }

    /**
     * @param $id
     * @return Show
     */
    protected function detail($id) {
        $this->id = $id;
        throw new RuntimeException('Controller does not implement detail method.');
    }
    
    /**
     * @return Grid
     */
    protected function grid() {
        throw new RuntimeException('Controller does not implement grid method.');
    }

    /**
     * @return Form
     */
    protected function form() {
        throw new RuntimeException('Controller does not implement form method.');
    }


}
