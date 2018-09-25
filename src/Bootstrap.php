<?php

namespace Mattmangoni\NovaBlogifyTool;

use Laravel\Nova\Nova;
use Illuminate\Support\Facades\Schema;
use Mattmangoni\NovaBlogifyTool\Resources\Tag;
use Mattmangoni\NovaBlogifyTool\Resources\Post;
use Mattmangoni\NovaBlogifyTool\Resources\Comment;
use Mattmangoni\NovaBlogifyTool\Resources\Category;

class Bootstrap
{
    /**
     * Expected tables array.
     *
     * @var array
     */
    public static $expectedTables = [
        'categories', 'posts', 'comments', 'tags',
    ];

    /**
     * Inject blogify resources.
     */
    public function injectResources(): void
    {
        if ($this->isInstalled()) {
            Nova::resources([
                Category::class,
                Post::class,
                Comment::class,
                Tag::class,
            ]);
        }
    }

    /**
     * Check blogify installation status.
     *
     * @return bool
     */
    public function isInstalled(): bool
    {
        foreach (static::$expectedTables as $table) {
            if (! Schema::hasTable($table)) {
                return false;
            }
        }

        return true;
    }
}
