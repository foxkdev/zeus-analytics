<?php

namespace Zeus\Analytics;

use Illuminate\Support\ServiceProvider;

class AnalyticsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';
        $this->publishes([
            __DIR__ . '/../config/zeus_analytics.php' => config_path('zeus_analytics.php'),
        ], 'zeus_analytics');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->bind('Zeus\Analytics\AnalyticsServiceProvider', function ($app) {
          $config = $app['config']->get('zeus_analytics.analytics_config');
          return new ZeusAnalytics($config);
      });
    }
}
