<?php
namespace LTTools\Extension\Database\Seeders;

use Encore\Admin\Auth\Database\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use LTTools\Extension\Entities\InstallLog;


class LTToolsDatabaseSeeder extends Seeder
{


    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
//        if($menu = InstallLog::find(1)){
//            Menu::where('id',$menu->menu_id)->orWhere('parent_id',$menu->menu_id)->delete();
//        }
//
//        $date = date("Y-m-d H:i:s");
//        $TopMenus = [
//            'parent_id' => 0,
//            'order'     => 1,
//            'title'     => '模块更新',
//            'icon'      => 'fa-database',
//            'uri'       => '/lt-update',
//            'created_at' => $date,
//            'updated_at' => $date
//        ];
//        $parentId = Menu::insertGetId($TopMenus);

    }

}
