<?php
namespace Julong\LaravelPay;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;



class PayServiceProvider extends ServiceProvider
{

    protected $defer = true;

    public function boot()
    {
        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([
                dirname(__DIR__).'/config/pay.php' => config_path('pay.php'),
                dirname(__DIR__).'/config/key/' => config_path('key'),
            ],
                'laravel-pay'
            );
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(dirname(__DIR__).'/config/pay.php', 'pay');
        $this->app->singleton('pay.alipay', function () {
            return Pay::alipay(config('pay.alipay'));
        });
        $this->app->singleton('pay.wechatpay', function () {
            return Pay::wechatpay(config('pay.wechatpay'));
        });
    }

    public function provides()
    {
        return ['pay.alipay','pay.wechatpay'];
    }
}