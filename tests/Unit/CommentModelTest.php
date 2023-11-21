<?php

namespace Tests\Unit;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_post_relationship(): void
    {
        $this->withoutExceptionHandling();

        $post = Post::factory()->create();
        Comment::factory()
            ->for($post)
            ->create();

        $this->assertInstanceOf(Collection::class, $post->comments);
    }
}
