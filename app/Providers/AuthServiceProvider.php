<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('Supervisor', function(User $user){
            return $user->hasRole('Supervisor');
        });

        Gate::define('Backoffice', function(User $user){
            return $user->hasRole('Backoffice');
        });

        Gate::define('Reporting', function(User $user){
            return $user->hasRole('Agent');
        });

        Gate::define('Agent', function(User $user){
            return $user->hasRole('Agent');
        });
        Gate::after(function (User $user) {
            return $user->hasRole('Admin') ? true : null;
        });
        //
    }
}
