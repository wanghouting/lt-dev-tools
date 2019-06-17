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
], function (Router $router) {
    $router->resource('update', 'UpdateController');
});
