<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory([
            'name' => 'Zeshan',
            'password' => Hash::make('password'),
            'email' => 'zeshan77@gmail.com',
        ])->create();

        Post::factory()
            ->for($user)
            ->count(10)
            ->create();
    }
}
