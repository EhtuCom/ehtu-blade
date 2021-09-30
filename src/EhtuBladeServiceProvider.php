<?php

namespace Ehtu\EhtuBlade;

use Illuminate\Support\ServiceProvider;

class EhtuBladeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'EhtuBlade');
    }
    public function register()
    {
        parent::register(); // TODO: Change the autogenerated stub
    }
}
