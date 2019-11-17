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
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-users', function ($user){
            return $user->hasRole('Admin'); /**change to hasAnyRoles for multiple users**/
        });

        Gate::define('edit-users', function ($user){
            return $user->hasRole('Admin');
        });

        Gate::define('delete-users', function ($user){
            return $user->hasRole('Admin');
        });

        Gate::define('show-appoint', function ($user){
            return $user->hasRole('Service Marketing');
        });

        Gate::define('show-jcs', function ($user){
            return $user->hasRole('Job Controller');
        });
    }
}
