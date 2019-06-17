<?php

namespace LTTools\Extension\Controllers\Base;


use Encore\Admin\Controllers\HasResourceActions;
use Illuminate\Routing\Controller;


use LTTools\Extension\Tools\Form\Form;
use LTTools\Extension\Tools\Grid\Grid;
use LTTools\Extension\Tools\Layout\Content;
use RuntimeException;



/**
 * Class AdminBaseController
 * @author wanghouting
 * @package LTTools\Extension\Controllers\Base;
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
     * @return
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
