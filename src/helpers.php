<?php


if(! function_exists('has_disabled_functions')){
    function has_disabled_functions($functionName){
        $all = ini_get('disable_functions');
        $arrArr = explode(',',$all);
        foreach ($arrArr as $func){
            if($func == $functionName)
                return true;
        }
        return false;
    }
}

if (! function_exists('get_switch_state')) {
    function get_switch_state($type = 0)
    {
        $arr = [
            [
                'on'  => ['value' => 1, 'text' => '打开', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => '关闭', 'color' => 'danger'],
            ],
            [
                'on'  => ['value' => 1, 'text' => '是', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => '否', 'color' => 'danger'],
            ]
        ];
        return array_key_exists($type,$arr) ? $arr[$type] : $arr[0];
    }
}
