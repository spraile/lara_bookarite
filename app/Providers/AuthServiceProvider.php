<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Title::class => TitlePolicy::class,       
        Category::class => CategoryPolicy::class,       
        Ticket::class => TicketPolicy::class,   
        Asset::class => AssetPolicy::class,   
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function ($user){
            return $user->role_id === 1;
        });

        Gate::define('isLogged', function ($user){
            return $user !== null;
        });
    }
}
