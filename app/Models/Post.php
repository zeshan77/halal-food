<?php

namespace App\Models;

use App\Models\Scopes\CurrentPostScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'body',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublished(Builder $builder)
    {
        $builder->whereNotNull('is_published');
    }

    protected static function booted()
    {
        self::addGlobalScope(new CurrentPostScope());


        self::created(function (Post $post) {
            Cache::flush('posts');
        });

        self::updated(function (Post $post) {
            Cache::flush('posts');
        });

        self::deleted(function (Post $post) {
            Cache::flush('posts');
        });

    }

}
