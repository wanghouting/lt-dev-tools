<?php

namespace LTUpdate\Extension\Facades;

use LTUpdate\Extension\Support\SettingSupport;
use Modules\Base\Facades\DbFacades;

/**
 * Class SettingFacade
 * @method  static mixed get($name, $default = null);
 * @package LTUpdate\Extension\Facades
 */
class SettingFacade extends DbFacades
{
    protected static function getFacadeAccessor()
    {
        return SettingSupport::class;
    }
}
