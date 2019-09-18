<?php

namespace Wuwx\LaravelAdminAuditing;

use Illuminate\Support\ServiceProvider;

class AuditingServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(Auditing $extension)
    {
        if (! Auditing::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'auditing');
        }

        if ($this->app->runningInConsole() && $migrations = $extension->migrations()) {
            $this->loadMigrationsFrom($migrations);
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/wuwx/laravel-admin-auditing')],
                'auditing'
            );
        }

        $this->app->booted(function () {
            Auditing::routes(__DIR__.'/../routes/web.php');
        });
    }
}
