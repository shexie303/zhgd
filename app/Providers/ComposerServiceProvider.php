<?php
/**
 * 视图Composer
 * @author lc
 */

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * 在容器中注册绑定.
     *
     * @return void
     * @author http://laravelacademy.org
     */
    public function boot()
    {
        // 使用基于类方法的 composers...
        View::composer('default.common.header', 'App\Http\ViewComposers\Home\HeaderComposer');

        // 使用基于回调函数的 composers...
//        View::composer('admin.index', function ($view) {
//            return $view->with('abc','123456');
//        });
    }

    /**
     * 注册服务提供者.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}