<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', static function (Blueprint $table) {
            $table->dateTime('published_at')
                ->nullable()
                ->after('body');

            $table->boolean('is_reviewed')
                ->default(0)
                ->after('published_at');

            $table->text('meta')
                ->nullable()
                ->after('is_reviewed');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', static function (Blueprint $table) {
            $table->dropColumn([
                'published_at',
                'is_reviewed',
                'meta',
            ]);
        });
    }
};
