<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{

    public static $permission = [
        //USER AUTHENTICATION
        'dashboard' => ['administrator',],
        'index-user' => ['administrator',],
        'create-user' => ['administrator',],
        'edit-user' => ['administrator',],
        'update-user' => ['administrator',],
        'destroy-user' => ['administrator',],

        //SERVER AUTHENTICATION
        'index-server' => ['administrator','sysadmin','operator'],
        'create-server' => ['administrator','sysadmin',],
        'store-server' => ['administrator','sysadmin',],
        'show-server' => ['administrator','sysadmin','operator'],
        'edit-server' => ['administrator','sysadmin',],
        'update-server' => ['administrator','sysadmin',],
        'destroy-server' => ['administrator','sysadmin',],
        'auth-server' => ['administrator','sysadmin',],

        //NETWORK AUTHENTICATION
        'index-network' => ['administrator','networking'],
        'create-network' => ['administrator','networking'],
        'show-network' => ['administrator','networking'],
        'edit-network' => ['administrator','networking'],
        'delete-network' => ['administrator','networking'],

    ];
    /**
     * The model to policy mappings for the application.
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

        Gate::before(function (User $user) {
            if ($user->role =='superadmin') {
                return true;
            }
        });


        foreach (self::$permission as $action => $role) {
            Gate::define($action, function(User $user) use ($role) {
                if (in_array($user->role, $role)){
                    return true;
                }
            });
        }

    }
}
