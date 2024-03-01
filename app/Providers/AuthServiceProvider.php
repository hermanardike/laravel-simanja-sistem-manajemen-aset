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
        'dashboard' => ['administrator','admin',],
        'index-user' => ['administrator','admin',],
        'create-user' => ['administrator','admin',],
        'edit-user' => ['administrator','admin',],
        'update-user' => ['administrator','admin',],
        'destroy-user' => ['administrator','admin',],

        //SERVER ASSET AUTHENTICATION
        'index-server' => ['administrator','sysadmin','operator'],
        'create-server' => ['administrator','sysadmin',],
        'show-server' => ['administrator','sysadmin','operator'],
        'edit-server' => ['administrator','sysadmin',],
        'delete-server' => ['administrator','sysadmin',],
        'auth-server' => ['administrator','sysadmin',],

        //NETWORK ASSET AUTHENTICATION
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
