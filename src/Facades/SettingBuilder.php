<?php
namespace LTUpdate\Extension\Facades;


use Illuminate\Support\Facades\Facade;
use LTUpdate\Extension\Support\SettingViewBuilder;

/**
 * Class SettingBuilder
 * @method static \Encore\Admin\Widgets\Tab buildSetting($model,  \Illuminate\Http\Request $request, \Illuminate\Support\Collection $settingTypes ,array $settings)
 * @author wanghouting
 * @package LTUpdate\Extension\Facades
 */
class SettingBuilder extends Facade {
    protected static function getFacadeAccessor() {
        return SettingViewBuilder::class;
    }
}
