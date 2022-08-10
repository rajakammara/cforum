<?php

namespace App\Providers;

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

        //
        /* define a Master Admin user role */
        Gate::define('isMasterAdmin', function ($user) {
            return $user->role == 'master_admin';
        });

        /* define a local admin user role */
        Gate::define('isLocalAdmin', function ($user) {
            return $user->role == 'local_admin';
        });

        /* define a department user role */
        Gate::define('isDistUser', function ($user) {
            return $user->role == 'dist_user';
        });
        /* define a department div user role */
        Gate::define('isDivUser', function ($user) {
            return $user->role == 'div_user';
        });

        /* define a user role */
        Gate::define('isUser', function ($user) {
            return $user->role == 'user';
        });
    }
}
