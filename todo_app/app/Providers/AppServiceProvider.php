<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 登録できる最大文字数を191文字にする。（マイグレーション時にエラーになる為、設定が必要）
        \Schema::defaultStringLength(191);
    }
}
