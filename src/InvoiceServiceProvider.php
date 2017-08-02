<?php

/*
 * This file is part of Laravel Invoice.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Invoice;

use Illuminate\Support\ServiceProvider;

class InvoiceServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/laravel-invoice.php' => config_path('laravel-invoice.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/laravel-invoice'),
        ], 'views');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-invoice');
    }

    /**
     * Register bindings in the container.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-invoice.php', 'laravel-invoice');
    }
}
