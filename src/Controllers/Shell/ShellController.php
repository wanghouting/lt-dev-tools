<?php

namespace LTTools\Extension\Controllers\Shell;

use Encore\Admin\Admin;
use LTTools\Extension\Controllers\Base\AdminBaseController;
use LTTools\Extension\Tools\Layout\Content;


/**
 * shell控制器
 * Class ShellController
 * @author wanghouting
 */
class ShellController extends AdminBaseController
{

    protected $description = "操作";


    public function __construct()
    {

        $this->header = 'SHELL控制台';
    }

    public function index(Content $content)
    {
        $this->iframeAutoHegiht('external-frame-shell1');

        $grid = '<iframe src="'.$this->getShellSrc().'" id="external-frame-shell1"  width="100%" height="100%" style=" border: 0;min-height: 700px " scrolling="no"></iframe>';

        return $content->init($this->header,$this->description,$grid);
    }

    public function layer(){
        $this->iframeAutoHegiht('external-frame-shell2');
        echo "<style> body {background-color: #0C0C0C} </style>";
        echo "<div style='width:100%;height: auto;background-color: #0C0C0C;margin: 20px 0;'>";
        return  '<iframe src="'.$this->getShellSrc().'" id="external-frame-shell2"  width="100%" height="100%" style=" border: 0;min-height: 500px " scrolling="no"></iframe>';

    }

    private function getShellSrc(){
        $src = config('webconsole.route_prefix') ?  '/'.config('webconsole.route_prefix') .'/' : '/';
        return $src . config('webconsole.route_name');

    }

    private function iframeAutoHegiht($element){
        $script= <<<EOF
            function setIframeHeight(iframe) {
                if (iframe) {
                    var iframeWin = iframe.contentWindow || iframe.contentDocument.parentWindow;
                    if (iframeWin.document.body) {
                        iframe.height = iframeWin.document.documentElement.scrollHeight || iframeWin.document.body.scrollHeight;
                    }
                }
            };
            window.onload = function () {
                setIframeHeight(document.getElementById('{$element}'));
            };
EOF;
        Admin::script($script);
    }
}