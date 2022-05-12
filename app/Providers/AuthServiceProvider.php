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

        Gate::define('admin-only', function ($user) {
            if ($user->role == 'admin'){
                return true;
            }
            return false;
        });

        Gate::define('manage-user', function($user){
            if ($user->role == 'admin' || $user->role == 'user'){
                return true;
            }
        });

        Gate::define('manage-klasifikasi', function($user){
            if ($user->role == 'admin'){
                return true;
            }
        });
        
        Gate::define('manage-instansi', function($user){
            if ($user->role == 'admin'){
                return true;
            }
        });
    }
}
