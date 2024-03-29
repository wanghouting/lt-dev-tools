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
    'prefix' => config('lttools.route_prefix').'/lttools',
    'middleware' => ['web', 'admin']
], function (Router $router) {
    $router->get('update/upgradeCode', 'UpdateController@upgradeCode');
    $router->get('update/upgradeDb', 'UpdateController@upgradeDb');
    $router->get('update/refreshDb', 'UpdateController@refreshDb');
    $router->resource('update', 'UpdateController');
});

Route::group([
    'namespace' => "LTTools\\Extension\\Controllers\\Shell",
    'prefix' => config('lttools.route_prefix').'/lttools/shell',
    'middleware' => ['web', 'admin']
], function (Router $router) {
    $router->get('/', 'ShellController@index');
    $router->get('layer', 'ShellController@layer');
});

Route::group([
    'namespace' => "LTTools\\Extension\\Controllers\\Log",
    'prefix' => config('lttools.route_prefix').'/lttools/logs',
    'middleware' => ['web', 'admin']
], function (Router $router) {
    $router->get('/', 'LogController@index');
    $router->get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
});