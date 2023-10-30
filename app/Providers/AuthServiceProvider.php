<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
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
//        Gate::before(function(User $user) {
//            if($user->id === 1) {
//                return true;
//            }
//
//            return null;
//        });
//
//        Gate::define('update-post', function (User $user, Post $post) {
//
//            if($user->id === $post->user_id) {
//                return true;
//            }
//
//            return false;
//        });
    }
}
