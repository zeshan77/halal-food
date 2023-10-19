<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = [
            ['name' => 'Ali', 'email' => 'ali@mail.com'],
            ['name' => 'Asad', 'email' => 'asad@mail.com'],
        ];

        return view('users', [
            'users' => $users
        ]);
    }

    public function show($user)
    {
        return $user;
    }
}
