<?php
/**
 * 前台视图HeaderComposer
 * 顶部用户信息绑定到视图
 */

namespace App\Http\ViewComposers\Home;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HeaderComposer
{
    /**
     * 绑定数据到视图.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $site_user = Auth::user();
        $view->with('site_user', $site_user);
    }
}