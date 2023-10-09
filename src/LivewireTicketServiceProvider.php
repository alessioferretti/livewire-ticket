<?php

namespace AlessioFerretti\LivewireTicket;

use AlessioFerretti\LivewireTicket\Livewire\LivewireTicketNew;
use AlessioFerretti\LivewireTicket\Livewire\LtTicketTable;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class LivewireTicketServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        Livewire::component('lt-new', LivewireTicketNew::class);
        Livewire::component('lt-table', LtTicketTable::class);
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'alessio-ferretti');
         $this->loadViewsFrom(__DIR__.'/../resources/views', 'alessio-ferretti');
         $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        //$this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/livewire-ticket.php', 'livewire-ticket');

        // Register the service the package provides.
        $this->app->singleton('livewire-ticket', function ($app) {
            return new LivewireTicket;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['livewire-ticket'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/livewire-ticket.php' => config_path('livewire-ticket.php'),
        ], 'livewire-ticket.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/alessio-ferretti'),
        ], 'livewire-ticket.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/alessio-ferretti'),
        ], 'livewire-ticket.assets');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/alessio-ferretti'),
        ], 'livewire-ticket.lang');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
