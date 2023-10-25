<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory([
            'name' => 'Sohaib',
        ])->create();

        Post::factory()
            ->for($user)
            ->count(1000)
            ->create();
    }
}
