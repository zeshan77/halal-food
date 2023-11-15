<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_renders_login_screen(): void
    {
        $this->get('/login')
            ->assertStatus(200)
            ->assertViewIs('auth.login')
            ->assertSee([
                'Login',
                'Email',
                'Password',
            ]);
    }

    public function test_users_can_authenticate_via_login_screen(): void
    {
        $this->withoutExceptionHandling();

        // settings
        $user = User::factory()
            ->create([
                'email' => 'fake@mail.com',
                'password' => 'my-password',
            ]);

        // action
        $response = $this->post('/login', [
            'email' => 'fake@mail.com',
            'password' => 'my-password',
        ])
            ->assertStatus(302);
        // assertions
        $this->assertAuthenticatedAs($user);

    }

    public function test_users_can_not_authenticate_with_wrong_email(): void
    {
        $user = User::factory()
            ->create([
                'email' => 'fake@mail.com',
                'password' => 'my-password',
            ]);

        $response = $this->post('/login', [
            'email' => 'wrong@mail.com',
            'password' => 'my-password',
        ])
            ->assertStatus(302);

        $this->assertGuest();
    }

    public function test_users_can_not_authenticate_with_wrong_password(): void
    {
        $user = User::factory()
            ->create([
                'email' => 'fake@mail.com',
                'password' => 'my-password',
            ]);

        $response = $this->post('/login', [
            'email' => 'fake@mail.com',
            'password' => 'wrong-password',
        ])
            ->assertStatus(302);

        $this->assertGuest();
    }

    public function test_users_can_not_authenticate_with_invalid_email(): void
    {
        $user = User::factory()
            ->create([
                'email' => 'fake@mail.com',
                'password' => 'my-password',
            ]);

        $response = $this->post('/login', [
            'email' => 'invalid-email',
            'password' => 'wrong-password',
        ])
            ->assertInvalid(['email']);
    }

    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        $user = User::factory()
            ->create([
                'email' => 'fake@mail.com',
                'password' => 'my-password',
            ]);

        $response = $this->post('/login', [
            'email' => 'fake@mail.com',
            'password' => 'abc',
        ])
            ->assertInvalid([
                'password' => 'The password field must be at least 8 characters.',
            ]);
    }
}
