<?php
namespace Julong\Pay;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;

use Laravel\Lumen\Application as LumenApplication;

class PayServiceProvider extends ServiceProvider
{

    protected $defer = true;

    public function boot()
    {
        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([
                dirname(__DIR__).'/config/pay.php' => config_path('pay.php'), ],
                'laravel-pay'
            );
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('pay');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(dirname(__DIR__).'/config/pay.php', 'pay');
        $this->app->singleton('pay.alipay', function () {
            return Pay::alipay(config('pay.alipay'));
        });
//        $this->app->singleton('pay.wechat', function () {
//            return Pay::wechat(config('pay.wechat'));
//        });
    }

    public function provides()
    {
        return ['pay.alipay'];
    }
}