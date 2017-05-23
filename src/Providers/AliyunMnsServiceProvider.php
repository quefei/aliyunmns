<?php

namespace Quefei\AliyunMns\Providers;

use Illuminate\Support\ServiceProvider;
use Quefei\AliyunMns\Services\AliyunMnsService;

class AliyunMnsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        /**
         * 生成配置文件
         */
        $this->publishes([
            __DIR__.'/../Config/AliyunMnsConfig.php' => config_path('aliyunmns.php'),
        ]);
    }


    public function register()
    {
        $this->registerAliyunMnsBind();

        $this->registerAliyunMnsSingleton();
    }


    private function registerAliyunMnsBind()
    {
        $this->app->bind('Quefei\AliyunMns\Contracts\AliyunMnsContract', function () {
            return new AliyunMnsService();
        });
    }


    private function registerAliyunMnsSingleton()
    {
        $this->app->singleton('aliyunmns', function () {
            return new AliyunMnsService();
        });
    }
}
