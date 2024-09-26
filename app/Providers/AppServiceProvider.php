<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Ticket; // Add this
use App\Policies\TicketPolicy; // Add this


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }




    protected $policies = [
        Ticket::class => TicketPolicy::class,
    ];
    

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
