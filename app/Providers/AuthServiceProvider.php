<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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

        Gate::define('adminRole', function (User $user) {
            return $user->userRole->id == 1;
        });

        Gate::define('agentRole', function (User $user) {
            return $user->userRole->id == 2;
        });

        Gate::define('clientRole', function (User $user) {
            return $user->userRole->id == 3;
        });
    }
}
