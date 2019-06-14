<?php
namespace LTUpdate\Extension\Support;
use Illuminate\Support\Facades\DB;
use LTUpdate\Extension\Entities\Rule;
use LTUpdate\Extension\Entities\RunLog;
use LTUpdate\Extension\Facades\SettingFacade;

/**
 * @author wanghouting
 * Class LTUpdate
 */
class LTUpdate{





    private function runLog($id,$log){
       file_put_contents(storage_path('logs/backup/'.$id.'_backup.log'),date('Y-m-d H:i:s').': '.$log."\n",8);
    }

}