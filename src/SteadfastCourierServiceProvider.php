<?php

namespace Sujan7a\SteadfastCourier;

use Illuminate\Support\ServiceProvider;

class SteadfastCourierServiceProvider extends ServiceProvider
{
  public function register()
  {
    $this->mergeConfigFrom(__DIR__ . '/../config/steadfast.php', 'steadfast');
  }

  public function boot()
  {
    if ($this->app->runningInConsole()) {
      $this->publishes([
        __DIR__ . '/../config/steadfast.php' => config_path('steadfast.php'),
      ], 'config');
    }
  }
}