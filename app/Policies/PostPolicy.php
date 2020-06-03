<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return false;
    }

    public function view(User $user, Post $post)
    {
        return true;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Post $post)
    {
        if($post->created_at->diffInDays(now()) > 1)
            return false;
        return $user->id === $post->user->id;
    }

    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user->id;
    }
}
