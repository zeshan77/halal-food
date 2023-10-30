<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    public function before(User $user): ?bool
    {
        if($user->email === 'zeshan77@gmail.com') {
            return true;
        }

        return null;
    }

    public function update(User $user, Post $post): bool
    {
        if($user->id === $post->user_id) {
            return true;
        }

        return false;
    }

    public function delete(User $user, Post $post): bool
    {
        if($user->id === $post->user_id) {
            return true;
        }

        return false;
    }
}
