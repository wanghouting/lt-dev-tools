<?php
/**
 * Created by PhpStorm.
 * User: wanghouting
 * Date: 2019-06-14
 * Time: 13:40
 */
use Illuminate\Routing\Router;

Route::group([
    'namespace' => "LTTools\\Extension\\Controllers\\Update",
    'prefix' => 'admin/lttools',
    'middleware' => ['web', 'admin']
], function (Router $router) {
    $router->get('update/upgradeCode', 'UpdateController@upgradeCode');
    $router->get('update/upgradeDb', 'UpdateController@upgradeDb');
    $router->get('update/refreshDb', 'UpdateController@refreshDb');
    $router->resource('update', 'UpdateController');
});
