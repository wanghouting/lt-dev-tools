<?php


namespace LTTools\Extension\Tools\Custom;


use Encore\Admin\Admin;
use LTTools\Extension\Facades\ModulesFacade;

class ModuleGrid
{
    protected  $data;

    public function __construct(array $data)
    {
        $this->data   = $data;
    }

    protected function script(){

        return <<<SCRIPT
              $('#lt-tool-update .update-btn').on('click',function() {
                       layer.open({
                                  type: 2,
                                  skin: 'layui-layer-rim-blank', //加上边框
                                  area: ['640px', '420px'], //宽高
                                  content: '/admin/lttools/update/upgrade'
                       });
                });
SCRIPT;

    }

    public function render()
    {

        Admin::script($this->script());

        $html =   <<<EOF
        <style>
            #lt-tool-update {
                padding-bottom: 30px;
            }
            #lt-tool-update  .lt-module-list{
                text-align: center;
             
            }
            #lt-tool-update .lt-module-box{
                width: 80px; height: 80px;background-color:#FF9233 ;margin: 40px;display: inline-block; border-radius: 50%;
            }
            
             #lt-tool-update .lt-module-box h5,  #lt-tool-update  h3{ text-align: center;margin-top: 32px;}
             body .layui-layer-rim-blank {border:6px solid #8D8D8D;border:6px solid rgba(0,0,0,.3);border-radius:5px;box-shadow:none}
             
             
        </style>

EOF;

        $html .= '<div id="lt-tool-update" class="box"><h3>当前分支：<font color="#db7093">'.ModulesFacade::getBranch().'</font></h3> <h1 class="lt-module-list">';

        foreach ($this->data as $module){
            $html .= '<div class="lt-module-box"><h5>'.$module['name'].'</h5></div>';
        }

        return $html . '</h1><h3><a href="javascript:void(0)" class="btn btn-primary update-btn">全部更新</a></h3></div>';

    }
}