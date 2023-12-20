<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Permission;
use App\Models\Post;
use App\Models\User;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('viewPulse', function (User $user) {

            return false;

            return in_array($user->email, [
//                'admin@mail.com',
                'abc@mail.com',
            ], true);
        });



        Gate::before(static function (User $user) {
            if($user->hasRole('super-admin')) {
                return true;
            }

            return null;
        });

        if(app()->runningInConsole()) {
            return;
        }

        $permissions = Permission::get();

        foreach($permissions as $permission) {
            Gate::define($permission->slug, function (User $user) use ($permission) {
                return $user->hasRole($permission->roles);
            });
        }
    }
}
