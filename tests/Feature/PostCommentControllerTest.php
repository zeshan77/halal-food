<?php

namespace Tests\Feature;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostCommentControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_renders_comment_form(): void
    {
        // Settings
        $post = Post::factory()->create();
        $user = User::factory()->create();
        $this->actingAs($user);

        // Actions
        $this->get('/posts/' . $post->id . '/show')
            ->assertOk()
            ->assertSee('Post your comment');


        // Assetions
    }

    public function test_only_authenticated_users_can_post_their_comments(): void
    {
        $this->withoutExceptionHandling();

        // Settings
        $post = Post::factory()->create();
        $user = User::factory()->create();
        $this->actingAs($user);

        $this->post('/posts/' . $post->id . '/comments', [
            'body' => 'Lorem ipsum',
        ]);

        // Assertions
        $this->assertDatabaseHas('comments', [
            'body' => 'Lorem ipsum',
        ]);
    }

    public function test_non_authenticated_users_cannot_post_comments(): void
    {
        $post = Post::factory()->create();

        $this->post('/posts/' . $post->id . '/comments', [])
            ->assertRedirect('/login');
    }

    public function test_validate_comment_form_inputs(): void
    {
        $post = Post::factory()->create();
        $user = User::factory()->create();
        $this->actingAs($user);

        $this->post('/posts/' . $post->id . '/comments', [
            'body' => 'abc',
        ])->assertInvalid(['body']);
    }

    public function test_shows_posted_comments(): void
    {
        $this->withoutExceptionHandling();

        $post = Post::factory()->create();
        $user = User::factory()->create();
        $this->actingAs($user);
        $comment = Comment::factory()
            ->for($post)
            ->create([
            'body' => 'Lorem ipsum abc',
        ]);

        $this->get('/posts/' . $post->id . '/show')
            ->assertSee('Lorem ipsum abc');
    }


}
