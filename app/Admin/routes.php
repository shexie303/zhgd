<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('siteAuth/users', 'UserController');
    $router->resource('siteAuth/permissions', 'PermissionController');
    $router->resource('siteAuth/roles', 'RoleController');
    $router->resource('siteAuth/constructions', 'ConstructionController');

});