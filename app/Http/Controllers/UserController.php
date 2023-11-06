<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::with('roles')->paginate(10);

        return view('users.index', [
            'users' => $users
        ]);
    }

    public function show($user)
    {
        return $user;
    }
}
