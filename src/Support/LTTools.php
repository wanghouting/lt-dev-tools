<?php
namespace LTTools\Extension\Support;
use Illuminate\Support\Facades\DB;
use LTTools\Extension\Entities\Rule;
use LTTools\Extension\Entities\RunLog;
use LTTools\Extension\Facades\SettingFacade;
use LTTools\Extension\Tools\Buttons\ToolsButton;

/**
 * @author wanghouting
 * Class LTTools
 */
class LTTools{

    public function showNav(){
        echo (new ToolsButton())->render();
    }

    private function runLog($id,$log){
        file_put_contents(storage_path('logs/backup/'.$id.'_backup.log'),date('Y-m-d H:i:s').': '.$log."\n",8);
    }

}