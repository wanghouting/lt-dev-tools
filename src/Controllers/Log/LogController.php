<?php

namespace LTTools\Extension\Controllers\Log;

use Encore\Admin\Admin;
use LTTools\Extension\Controllers\Base\AdminBaseController;
use LTTools\Extension\Tools\Layout\Content;


/**
 * log控制器
 * Class LogController
 * @author wanghouting
 */
class LogController extends AdminBaseController
{

    protected $description = "记录";


    public function __construct()
    {
        $this->header = '系统日志';
    }

    public function index(Content $content)
    {
        $this->iframeAutoHegiht('external-frame-log1');

        $grid = '<iframe src="/'.config('lttools.route_prefix').'/lttools/logs/logs" id="external-frame-log1"  width="100%" height="100%" style=" border: 0;min-height: 1100px " scrolling="no"></iframe>';

        return $content->init($this->header,$this->description,$grid);
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